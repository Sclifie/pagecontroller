<?php
function getDataFromFile($file_name){
    $file_open = fopen($file_name, 'r');
    if ($file_name) {
        while (($data = fread($file_open, 4096)) !== false){
            return false;
        }
        fclose($file_open);
    }
    return false;
}
function addDataToFile($data, $file_name){
    return file_put_contents(
        $file_name,
        serialize($data),
        FILE_APPEND
    );
}

function checkUsers($data,$file_name){
    $what_in_file = function ($file_name){
        if(file_get_contents($file_name) !== null) {
            return true;
        } else {
            return false;
        }
    };

    if($what_in_file){
        $file_array = unserialize(file_get_contents($file_name));
            foreach ($file_array as $value){
                $find = array_search($data,$value);
                if ($find === 'userEmail'){
                    return false;
                }
                if ($find === 'userLogin'){
                    return false;
                }
                if ($find === 'userPhone'){
                    return false;
                }
            }
        unset($value);
        return true;
    }
    return true;}

