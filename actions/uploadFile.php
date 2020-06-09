<?php
date_default_timezone_set('America/Toronto');
try {
    $filename = $_FILES['file']['name'];
    $expimg = explode('.', $filename);
    $imgexptype = $expimg[1];
    $date = date('m/d/Yh:i:sa', time());
    $rand = rand(10000, 99999);
    $encname = $date . $rand;
    $imgname = md5($encname) . '.' . $imgexptype;
    $path = "../storage/files/" . $imgname;
    move_uploaded_file($_FILES["file"]["tmp_name"], $path);

    $url = "/storage/files/" . $imgname;

    echo json_encode(array('filename' => $filename, 'url' => $url));

}catch (Exception $e){
    echo json_encode(false);
}

