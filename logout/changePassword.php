<?php
require_once '../DB.php';

if(isset($_POST['oldPass']) && isset($_POST['newPass'])){

    $db = new DB();
    $pdo = $db->connect();

    $stmt = $pdo->query("SELECT * FROM auth WHERE user='cr2k'");
    $stmt->execute();

    $result = $stmt->fetch();
    if($result['pass'] === md5($_POST['oldPass'])){

        $stmt = $pdo->prepare("UPDATE auth SET pass=? WHERE user='cr2k'");
        $stmt->execute(array(md5($_POST['newPass'])));

        if($stmt->rowCount() === 1){
            echo 'Le mot de passe a été mis à jour';
        }else{
            echo "Le mot de passe n'a pas été modifié.";
        }


    }else{
        echo 'Le mot de passe actuel est incorrect';
    }

}