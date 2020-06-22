<?php
date_default_timezone_set('America/Toronto');
require_once '../DB.php';

$db = new DB();
$pdo = $db->connect();


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // data
    $stmt = $pdo->prepare("SELECT * FROM companies WHERE id=:id LIMIT 1");
    $stmt->bindParam('id', $id);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $company = $stmt->fetch();

        // files

        try {
            $stmt = $pdo->prepare("SELECT * FROM files2 WHERE company_id=:id");
            $stmt->bindParam('id', $id);
            $stmt->execute();
            $company['files'] = $stmt->fetchAll();

        }catch (PDOException $e) {
            die("Error reading files: " . $e->getMessage());
        }
    }
}else{
    $company = false;
}