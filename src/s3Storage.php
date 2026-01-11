<?php

namespace App;

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class s3Storage implements FileStorage
{

    public function __construct(private $client, private $Bucket)
    {
        //
    }


    public function putFile($name, $content)
    {

        try {
            $this->client->putObject([
                'Bucket' => $this->Bucket,
                'Key'    => $name,
                'Body'   => $content,
            
            ]);
            echo ("uplouded to s3 succesfuly");
        } catch (AwsException $e) {

            echo "Error: " . $e->getAwsErrorMessage();
        }
    }
}





// Require the Composer autoloader.
// require 'vendor/autoload.php';

// use Aws\S3\S3Client;


// $file = "t.txt";
// $content = "testing file content ";

// $applicationKey = "K005OXOL5XUMeFshX4IBpcN/n5VfFzI";
// $keyName =  "fileStorage-app";
// $keyID = "0057fbd734b45860000000001";
// $Endpoint = "https://s3.us-east-005.backblazeb2.com";
// $Bucket = "fileStorageLearning";


// $s3 = new S3Client([
//     'version' => 'latest',
//     'region'  => 'us-east-005',
//     'endpoint' => $Endpoint,
//     'credentials' => [
//          'key' => $keyID,
//          'secret' => $applicationKey,
//     ],
// ]);

// try {
//     $s3->putObject([
//         'Bucket' => $Bucket,
//         'Key'    => $file,
//         'Body'   => $content,
       
//     ]);
// } catch (Aws\S3\Exception\S3Exception $e) {

//      echo "Error: " . $e->getAwsErrorMessage();
// }





// applicationKey:
// K005OXOL5XUMeFshX4IBpcN/n5VfFzI

// keyName:
// fileStorage-app

// keyID:
// 0057fbd734b45860000000001 

// Endpoint:s3.us-east-005.backblazeb2.com
