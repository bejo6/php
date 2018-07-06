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


$path = "/your/path/";
$list = scandir_recursive($path);
print_r($list);
