<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('America/Toronto');
require_once '../../DB.php';

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
$id = $_POST['id'];

try {
    $stmt = $pdo->prepare("UPDATE clients SET image=:image, firstname=:firstName, lastName=:lastName, birthday=:birthday,
            arrived=:arrived, country=:country, age=:age, sex=:sex, address=:address, phone1=:phone1, phone2=:phone2,
            email=:email, statut=:statut, status=:status, situation=:situation, nas=:nas, cp12=:cp12, cle=:cle, found=:found,
            profile=:profile, objectives=:objectives WHERE id=:id");

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
    $stmt->bindParam(':id', $id);

    $stmt->execute();

} catch (PDOException $e) {
    die("Error updating data: " . $e->getMessage());
}


// tables
for ($x = 1; $x <= 7; $x++) {
    $table = 'table' . $x;
    try {
        $stmt = $pdo->prepare("DELETE FROM `$table` WHERE client_id=:client_id");
        $stmt->bindParam(':client_id', $id);
        $stmt->execute();
    }catch (PDOException $e) {
        die("Error deleting tables: " . $e->getMessage());
    }

    if (isset($_POST['table' . $x . '_a'])) {
        for ($y = 0; $y < count($_POST['table' . $x . '_a']); $y++) {
            try {
                $stmt = $pdo->prepare("INSERT INTO `$table` (client_id, ta, tb, tc, td)
                            VALUES (:client_id, :ta, :tb, :tc, :td)");
                $stmt->bindParam(':client_id', $id);
                $stmt->bindParam(':ta', $_POST['table' . $x . '_a'][$y]);
                $stmt->bindParam(':tb', $_POST['table' . $x . '_b'][$y]);
                $stmt->bindParam(':tc', $_POST['table' . $x . '_c'][$y]);
                $stmt->bindParam(':td', $_POST['table' . $x . '_d'][$y]);

                $stmt->execute();

            } catch (PDOException $e) {
                die("Error updating tables: " . $e->getMessage());
            }
        }
    }
}

// files

// files
try {
    $stmt = $pdo->prepare("DELETE FROM files WHERE client_id=:client_id");
    $stmt->bindParam(':client_id', $id);
    $stmt->execute();
}catch (PDOException $e) {
    die("Error deleting files: " . $e->getMessage());
}

try {
    if (isset($_POST['file_name'])) {
        for ($x = 0; $x < count($_POST['file_name']); $x++) {
            $stmt = $pdo->prepare("INSERT INTO files (client_id, filename, url) 
                        VALUES (:client_id, :filename, :url)");

            $stmt->bindParam('client_id', $id);
            $stmt->bindParam('filename', $_POST['file_name'][$x]);
            $stmt->bindParam('url', $_POST['file_url'][$x]);
            $stmt->execute();
        }
    }
} catch (PDOException $e) {
    die("Error updating files: " . $e->getMessage());
}

setcookie("msg", "ok", time() + 3, "/client.php");
header('Location: /client.php?id=' . $id);