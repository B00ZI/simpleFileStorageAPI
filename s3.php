<?php



// Require the Composer autoloader.
require 'vendor/autoload.php';

use Aws\S3\S3Client;


$file = "t.txt";
$content = "testing file content ";

$applicationKey = "K005OXOL5XUMeFshX4IBpcN/n5VfFzI";
$keyName =  "fileStorage-app";
$keyID = "keyID";
$Emdpoint = "s3.us-east-005.backblazeb2.com";

$Bucket = "fileStorageLearning";


$s3 = new S3Client([
    'version' => 'latest',
    'region'  => 'us-east-005',
    'credentials' => [
         'key' => $keyID,
         'secret' => $applicationKey,
    ],
]);

try {
    $s3->putObject([
        'Bucket' => $Bucket,
        'Key'    => $file,
        'Body'   => $content,
       
    ]);
} catch (Aws\S3\Exception\S3Exception $e) {

     echo "Error: " . $e->getAwsErrorMessage();
}





// applicationKey:
// K005OXOL5XUMeFshX4IBpcN/n5VfFzI

// keyName:
// fileStorage-app

// keyID:
// 0057fbd734b45860000000001 

// Endpoint:s3.us-east-005.backblazeb2.com
