<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('America/Toronto');
require_once '../DB.php';

$db = new DB();
$pdo = $db->connect();

$image = (isset($_POST['image']) && $_POST['image'] !== '') ? $_POST['image'] : '/assets/img/company.png';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$sectorActivity = isset($_POST['sectorActivity']) ? $_POST['sectorActivity'] : '';
$numEmployee = isset($_POST['numEmployee']) ? intval($_POST['numEmployee']) : 0;
$numImmigrants = isset($_POST['numImmigrants']) ? intval($_POST['numImmigrants']) : 0;
$sectorJob = isset($_POST['sectorJob']) ? $_POST['sectorJob'] : '';

$check1 = isset($_POST['check1']) ? 1 : 0;
$check2 = isset($_POST['check2']) ? 1 : 0;
$check3 = isset($_POST['check3']) ? 1 : 0;
$check4 = isset($_POST['check4']) ? 1 : 0;
$check5 = isset($_POST['check5']) ? 1 : 0;
$check6 = isset($_POST['check6']) ? 1 : 0;
$check7 = isset($_POST['check7']) ? 1 : 0;
$check8 = isset($_POST['check8']) ? 1 : 0;
$check9 = isset($_POST['check9']) ? 1 : 0;

$person = isset($_POST['person']) ? $_POST['person'] : '';
$position = isset($_POST['position']) ? $_POST['position'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone1 = isset($_POST['phone1']) ? $_POST['phone1'] : '';
$phone2 = isset($_POST['phone2']) ? $_POST['phone2'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$remarks = isset($_POST['remarks']) ? $_POST['remarks'] : '';

$radio1 = isset($_POST['radio1']) ? $_POST['radio1'] : 0;
$radio2 = isset($_POST['radio2']) ? $_POST['radio2'] : 0;
$radio3 = isset($_POST['radio3']) ? $_POST['radio3'] : 0;
$radio4 = isset($_POST['radio4']) ? $_POST['radio4'] : 0;
$id = $_POST['id'];



try {
    $stmt = $pdo->prepare("UPDATE companies SET image=:image, name=:name, sectorActivity=:sectorActivity, numEmployee=:numEmployee, 
    numImmigrants=:numImmigrants, sectorJob=:sectorJob, check1=:check1, check2=:check2, check3=:check3, check4=:check4, check5=:check5, 
    check6=:check6, check7=:check7, check8=:check8, check9=:check9, person=:person, position=:position, email=:email, phone1=:phone1, 
    phone2=:phone2, address=:address, remarks=:remarks, radio1=:radio1, radio2=:radio2, radio3=:radio3, radio4=:radio4 WHERE id=:id");

    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':sectorActivity', $sectorActivity);
    $stmt->bindParam(':numEmployee', $numEmployee);
    $stmt->bindParam(':numImmigrants', $numImmigrants);
    $stmt->bindParam(':sectorJob', $sectorJob);
    $stmt->bindParam(':check1', $check1);
    $stmt->bindParam(':check2', $check2);
    $stmt->bindParam(':check3', $check3);
    $stmt->bindParam(':check4', $check4);
    $stmt->bindParam(':check5', $check5);
    $stmt->bindParam(':check6', $check6);
    $stmt->bindParam(':check7', $check7);
    $stmt->bindParam(':check8', $check8);
    $stmt->bindParam(':check9', $check9);
    $stmt->bindParam(':person', $person);
    $stmt->bindParam(':position', $position);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone1', $phone1);
    $stmt->bindParam(':phone2', $phone2);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':remarks', $remarks);
    $stmt->bindParam(':radio1', $radio1);
    $stmt->bindParam(':radio2', $radio2);
    $stmt->bindParam(':radio3', $radio3);
    $stmt->bindParam(':radio4', $radio4);
    $stmt->bindParam(':id', $id);

    $stmt->execute();

} catch (PDOException $e) {
    die("Error updating data: " . $e->getMessage());
}


// files
try {
    $stmt = $pdo->prepare("DELETE FROM files2 WHERE company_id=:company_id");
    $stmt->bindParam(':company_id', $id);
    $stmt->execute();
}catch (PDOException $e) {
    die("Error deleting files: " . $e->getMessage());
}

try {
    if (isset($_POST['file_name'])) {
        for ($x = 0; $x < count($_POST['file_name']); $x++) {
            $stmt = $pdo->prepare("INSERT INTO files2 (company_id, filename, url) 
                        VALUES (:company_id, :filename, :url)");

            $stmt->bindParam('company_id', $id);
            $stmt->bindParam('filename', $_POST['file_name'][$x]);
            $stmt->bindParam('url', $_POST['file_url'][$x]);
            $stmt->execute();
        }
    }
} catch (PDOException $e) {
    die("Error updating files: " . $e->getMessage());
}

setcookie("msg", "ok", time() + 3, "/company/");
header('Location: /company/?id=' . $id);