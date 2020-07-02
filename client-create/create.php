<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('America/Toronto');
require_once '../DB.php';

$db = new DB();
$pdo = $db->connect();

$image = (isset($_POST['image']) && $_POST['image'] !== '') ? $_POST['image'] : '/assets/img/user.png';
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$arrived = isset($_POST['arrived']) ? $_POST['arrived'] : '';
$country = isset($_POST['country']) ? $_POST['country'] : 'Choisissez votre option';
$age = isset($_POST['age']) ? $_POST['age'] : 'Choisissez votre option';
$sex = isset($_POST['sex']) ? $_POST['sex'] : 'f';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$phone1 = isset($_POST['phone1']) ? $_POST['phone1'] : '';
$phone2 = isset($_POST['phone2']) ? $_POST['phone2'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$statut = isset($_POST['statut']) ? $_POST['statut'] : 'Choisissez votre option';
$status = isset($_POST['status']) ? $_POST['status'] : 'Choisissez votre option';
$situation = isset($_POST['situation']) ? $_POST['situation'] : 'Choisissez votre option';
$nas = isset($_POST['nas']) ? $_POST['nas'] : '';
$cp12 = isset($_POST['cp12']) ? $_POST['cp12'] : '';
$cle = isset($_POST['cle']) ? $_POST['cle'] : 'Choisissez votre option';
$found = isset($_POST['found']) ? $_POST['found'] : '';
$profile = isset($_POST['profile']) ? $_POST['profile'] : '';
$objectives = isset($_POST['objectives']) ? $_POST['objectives'] : '';

try {
    $stmt = $pdo->prepare("INSERT INTO clients (image, firstName, lastName, birthday, arrived, country,
            age, sex, address, phone1, phone2, email, statut, status, situation, nas, cp12, cle, found,
            profile, objectives) VALUES (:image, :firstName, :lastName, :birthday, :arrived, :country, :age,
            :sex, :address, :phone1, :phone2, :email, :statut, :status, :situation, :nas, :cp12, :cle, :found,
            :profile, :objectives)");

    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':birthday', $birthday);
    $stmt->bindParam(':arrived', $arrived);
    $stmt->bindParam(':country', $country);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':phone1', $phone1);
    $stmt->bindParam(':phone2', $phone2);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':statut', $statut);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':situation', $situation);
    $stmt->bindParam(':nas', $nas);
    $stmt->bindParam(':cp12', $cp12);
    $stmt->bindParam(':cle', $cle);
    $stmt->bindParam(':found', $found);
    $stmt->bindParam(':profile', $profile);
    $stmt->bindParam(':objectives', $objectives);

    $stmt->execute();

} catch (PDOException $e) {
    die("Error inserting data: " . $e->getMessage());
}

if ($stmt->rowCount() > 0) {
    $client_id = $pdo->lastInsertId();

    for ($x = 1; $x <= 7; $x++) {
        if (isset($_POST['table' . $x . '_a'])) {
            for ($y = 0; $y < count($_POST['table' . $x . '_a']); $y++) {
                try {

                    $ta = $_POST['table' . $x . '_a'][$y];
                    $tb = convertDate($_POST['table' . $x . '_b'][$y]);
                    $tc = convertDate($_POST['table' . $x . '_c'][$y]);
                    $td = $_POST['table' . $x . '_d'][$y];


                    $table = 'table' . $x;
                    $stmt = $pdo->prepare("INSERT INTO `$table` (client_id, ta, tb, tc, td)
                            VALUES (:client_id, :ta, :tb, :tc, :td)");
                    $stmt->bindParam(':client_id', $client_id);
                    $stmt->bindParam(':ta', $ta);
                    $stmt->bindParam(':tb', $tb);
                    $stmt->bindParam(':tc', $tc);
                    $stmt->bindParam(':td', $td);

                    $stmt->execute();

                } catch (PDOException $e) {
                    die("Error inserting tables: " . $e->getMessage());
                }
            }
        }
    }

    // files
    try {
        if (isset($_POST['file_name'])) {
            for ($x = 0; $x < count($_POST['file_name']); $x++) {
                $stmt = $pdo->prepare("INSERT INTO files (client_id, filename, url) 
                        VALUES (:client_id, :filename, :url)");

                $stmt->bindParam('client_id', $client_id);
                $stmt->bindParam('filename', $_POST['file_name'][$x]);
                $stmt->bindParam('url', $_POST['file_url'][$x]);
                $stmt->execute();
            }
        }
    } catch (PDOException $e) {
        die("Error inserting files: " . $e->getMessage());
    }


    setcookie("created", "ok", time() + 3, "/clients/");
    header('Location: /clients/');


} else {
    die('Failed to create client');
}




function convertDate($date){
    $str = str_replace('/', '-', $date);
    return date('Y-m-d', strtotime($str));
}