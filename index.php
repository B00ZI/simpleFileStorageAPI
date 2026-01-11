<?php

require 'vendor/autoload.php';

use App\Storage;


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$save = Storage::use("s3");
$save->putFile("joy/haha.txt", "test content  2");
