<?php
date_default_timezone_set('America/Toronto');
require_once 'DB.php';

$db = new DB();
$pdo = $db->connect();


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // data
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE id=:id LIMIT 1");
    $stmt->bindParam('id', $id);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $client = $stmt->fetch();

        // tables
        for ($x = 1; $x <= 7; $x++) {
            try {
                $table = 'table' . $x;
                $stmt = $pdo->prepare("SELECT * FROM `$table` WHERE client_id=:id");
                $stmt->bindParam('id', $id);
                $stmt->execute();

                $client['table' . $x] = $stmt->fetchAll();

            } catch (PDOException $e) {
                die("Error reading tables: " . $e->getMessage());
            }
        }

        // files

        try {
            $stmt = $pdo->prepare("SELECT * FROM files WHERE client_id=:id");
            $stmt->bindParam('id', $id);
            $stmt->execute();
            $client['files'] = $stmt->fetchAll();

        }catch (PDOException $e) {
            die("Error reading tables: " . $e->getMessage());
        }
    }
//echo '<pre>';
//print_r($client);
//echo '</pre>';
}else{
    $client = false;
}