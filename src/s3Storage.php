<?php

namespace App;

require 'vendor/autoload.php';


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


