<?php
session_start();
require_once '../DB.php';



if(isset($_POST['password'])){
    $password = $_POST['password'];

    $db = new DB();
    $pdo = $db->connect();

    $stmt = $pdo->query("SELECT * FROM auth WHERE user='cr2k'");
    $stmt->execute();

    $result = $stmt->fetch();

    if(md5($password) === $result['pass']){
        $_SESSION['login'] = true;
        header('Location: /clients.php');
    }else{
        setcookie('msg', 'error', time() + 1, '/');
        $_SESSION['login'] = false;
        header('Location: /');
    }
}else{
    $_SESSION['login'] = false;
    header('Location: /');
}
