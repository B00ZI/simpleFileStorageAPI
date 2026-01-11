<?php

namespace App;

use Aws\S3\S3Client;


class Storage
{

    public static function use($storageType)
    {


        if ($storageType === "s3") {

            $s3 = new S3Client([
                'version' => 'latest',
                'region'  => 'us-east-005',
                'endpoint' => $_ENV['Endpoint'],
                'credentials' => [
                    'key' => $_ENV['key_ID'],
                    'secret' => $_ENV['application_Key'],
                ],
            ]);

            return new s3Storage($s3, $_ENV['Bucket']);

        }elseif ($storageType ==="local") {

            return new localStorage();
            
        }else{

          throw new \Exception("this storage type is not availebal ");
           
        }
    }
}
