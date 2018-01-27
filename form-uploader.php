<?php

require 'vendor/autoload.php';

$fileUploader = new Tessmann\File();
$logic = new Tessmann\Logic();

//Upload the file
$response = $fileUploader->uploader($_FILES['file']);
if (isset($response['error'])) {
    echo $response['message'];
    die;
}

//Return the array with data 
$response = $fileUploader->getArray();
if (isset($response['error'])) {
    echo $response['message'];
    die;
}

foreach ($response as $row) {
    $logic->think($row);
}
