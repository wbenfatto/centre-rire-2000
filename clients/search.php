<?php
date_default_timezone_set('America/Toronto');
require_once '../DB.php';

$db = new DB();
$pdo = $db->connect();

$search = isset($_POST['search']) ? $_POST['search'] : '';

$clients = array();

try {
    $stmt = $pdo->prepare("SELECT id, start, firstName, lastName, phone1, phone2, email 
                            FROM clients WHERE concat(firstName, lastName, phone1, phone2, email) LIKE ? LIMIT 25");
    $stmt->execute(array('%'.$search.'%'));
    $clients = $stmt->fetchAll();

}catch (PDOException $e){
    die("Error: " . $e->getMessage());
}


try{
    $counter = 0;
    foreach ($clients as $client){
        $stmt = $pdo->prepare("SELECT ta FROM table2 WHERE client_id=?");
        $stmt->execute(array($client['id']));
        $clients[$counter]['ta'] = $stmt->fetchAll();
        $counter++;
    }
}catch (PDOException $e){
    die("Error: " . $e->getMessage());
}
