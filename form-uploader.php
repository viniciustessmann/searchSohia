<?php

require 'vendor/autoload.php';

$fileUploader = new Tessmann\File();

$response = $fileUploader->uploader($_FILES['file']);
if (isset($response['error'])) {
    echo $response['message'];
    die;
}

$response = $fileUploader->getArray();
if (isset($response['error'])) {
    echo $response['message'];
    die;
}


echo '<pre>';
var_dump($response);