<?php
require_once '../DB.php';
 

if(isset($_POST['select'])){

    $table = htmlspecialchars($_POST['table']);
	$select = htmlspecialchars($_POST['select']);
	$initial = convertDate($_POST['initial']);
	$end = convertDate($_POST['end']);


	try{
		$db = new DB();
		$pdo = $db->connect();

		if($end >= $initial){
            $stmt = $pdo->prepare("SELECT * FROM `$table` t1 INNER JOIN clients t2 ON t1.client_id=t2.id WHERE t1.ta=:ta AND t1.tb>=:tb AND t1.tc<=:tc");
            $stmt->bindParam('ta', $select);
            $stmt->bindParam('tb', $initial);
            $stmt->bindParam('tc', $end);
            $stmt->execute();

            echo json_encode($stmt->fetchAll());


        }else{
		    echo json_encode(array());
        }

	}catch(PDOException $e){
		die("Error getting data: " . $e->getMessage());
	}
}


function convertDate($date){
    $str = str_replace('/', '-', $date);
    return date('Y-m-d', strtotime($str));
}