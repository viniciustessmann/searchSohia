<?php

require 'vendor/autoload.php';

$fileUploader = new Tessmann\File();

$fileUploader->uploader($_FILES['file']);

