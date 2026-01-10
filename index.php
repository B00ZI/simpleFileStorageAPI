<?php

require 'vendor/autoload.php';

use App\localStorage;
use App\s3Storage;
use Aws\S3\S3Client;


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$applicationKey = $_ENV['application_Key'];
$keyID = $_ENV['key_ID'];
$Endpoint = $_ENV['Endpoint'];
$Bucket = $_ENV['Bucket'];


$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'us-east-005',
    'endpoint' => $Endpoint,
    'credentials' => [
        'key' => $keyID,
        'secret' => $applicationKey,
    ],
]);


$put = new localStorage();
$put->putFile("tooot.txt", "test content test 2");

$put = new s3Storage($s3 , $Bucket);
$put->putFile("tst3.txt", "hooooooooest tses");
