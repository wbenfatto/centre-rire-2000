<?php
require_once '../DB.php';
 

if(isset($_POST['select'])){

	$select = $_POST['select'];
	$initial = $_POST['initial']; 
	$end = $_POST['end']; 


	try{
		$db = new DB();
		$pdo = $db->connect();

		$stmt = $pdo->prepare("SELECT * FROM table1 WHERE tb>:tb");
		$stmt->bindParam('tb', $_POST['initial']);
		$stmt->execute();


		echo json_encode($stmt->fetchAll());

	}catch(PDOException $e){
		die("Error getting data: " . $e->getMessage());
	}
}
