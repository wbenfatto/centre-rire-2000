<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('America/Toronto');
require_once '../DB.php';

$db = new DB();
$pdo = $db->connect();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    try{
        $stmt = $pdo->prepare("DELETE FROM companies WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }catch (PDOException $e){
        die("Error deleting company: ". $e->getMessage());
    }

    try{
        $stmt = $pdo->prepare("DELETE FROM files2 WHERE company_id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }catch (PDOException $e){
        die("Error deleting company files: ". $e->getMessage());
    }

}
setcookie("deleted", "ok", time() + 3, "/companies/");
header('Location: /companies/');
