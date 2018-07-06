<?php

function scandir_recursive($path){
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

    $res = array(); 

    foreach ($rii as $list) {

        if(substr($list->getPathname(), -2) == '/.'){
            continue;
        }
        if ($list->isDir()){
            $dir = substr($list->getPathname(),0, -3);
            if($dir != $path){
                $res['dir'][] = $dir;
            }
        }else{
            $res['file'][] = $list->getPathname(); 
        }
    }

    return $res;
}

/*
Usage :

$path = "/your/path";
$list = scandir_recursive($path);
print_r($list);

Example Result :

Array
(
    [file] => Array
        (
            [0] => /your/path/css/style.css
            [1] => /your/path/css/bootstrap.css
            [2] => /your/path/images/logo.png
            [3] => /your/path/js/jquery.js
            [4] => /your/path/js/script.js
        )

    [dir] => Array
        (
            [0] => /your/path/css
            [1] => /your/path/images
            [2] => /your/path/js
        )
)

*/
