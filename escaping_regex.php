<?php
function escaping_regex($string,$excludes = null) {
    $str_escape  = array('#','*','+','?','!','/','^','.','$','|','(',')','[',']','{','}');
    $arr_escape = array();
    $arr_replace = array();
    
    $ex = array_map('trim',explode(',',$excludes));
    foreach($str_escape as $esc){
        if (!in_array($esc, $ex)) {
            $arr_escape[]  = $esc;
            $arr_replace[] = '\\' . $esc;
        }
    }
    $newstr = str_replace($arr_escape,$arr_replace,$string);
    return $newstr;
}

