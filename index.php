<?php

require 'vendor/autoload.php';


use App\Storage ; 


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();





$save = Storage::use("local");
$save->putFile("tooot.txt", "test content test 2");


