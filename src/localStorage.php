<?php

namespace App;


class localStorage implements FileStorage
{

    public function putFile($file, $content)
    {
        $root = realpath(__DIR__ . "/../storage");

        $savePath = "{$root}/{$file}";
        $dir = dirname($savePath);

        if (!is_dir($dir)) {

            mkdir($dir, 0777, recursive: true);
        }


        file_put_contents($savePath, $content);
    }
}


// <?php
// $root = "storage";
// $file = "err/fddddd t.txt";
// $content = "testing file content ";
// $savePath = "{$root}/{$file}";
// $dir = dirname($savePath);

// if (!is_dir($dir)) {

//     mkdir($dir, 0777, recursive: true);

// }


// file_put_contents($savePath, $content);
