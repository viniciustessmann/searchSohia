<?php

require 'vendor/autoload.php';

$file = new Tessmann\File();
$logic = new Tessmann\Logic();

//Upload the file
$response = $file->uploader($_FILES['file']);
if (isset($response['error'])) {
    echo $response['message'];
    die;
}

//Return the array with data 
$response = $file->getArray();
if (isset($response['error'])) {
    echo $response['message'];
    die;
}

foreach ($response as $row) {
    $rows[] = $logic->think($row);
}

$file->output($rows);