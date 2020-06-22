<?php
date_default_timezone_set('America/Toronto');
require_once '../DB.php';

$db = new DB();
$pdo = $db->connect();

$search = isset($_POST['search']) ? $_POST['search'] : '';
$companies = array();

try {
    $stmt = $pdo->prepare("SELECT id, start, name, sectorActivity, sectorJob, phone1, phone2, email 
                            FROM companies WHERE concat(name, sectorActivity, sectorJob, phone1, phone2, email) LIKE ? LIMIT 25");
    $stmt->execute(array('%'.$search.'%'));
    $companies = $stmt->fetchAll();

}catch (PDOException $e){
    die("Error: " . $e->getMessage());
}


