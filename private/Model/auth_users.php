<?php
session_start();
include 'read_writeJSON.php';
function getUsers(){
    $users = file_get_contents('..\users_data\users_list.txt');
    return unserialize($users);
}

function auth_users(){
    $post = $_POST['reg_users_data'];
    $user_data = json_decode($post, true);
    $all_users_data = getUsers(); //  строка 1 этого файла
        foreach ($all_users_data as $arg){
            foreach ($arg as $value){
                if($value == $user_data['userEmail'] || $user_data['userLogin']){
                    if ($arg['userPassword'] == $user_data['userPassword']){

                        $_SESSION['auth'] = true;
                        $_SESSION['login'] = $arg['userLogin'];
                        echo 'ok';
                        return true;
                    }
                    echo 'wrong_pw';
                    return false;
                }
            }
        }
        unset($arg); // unset последних аргументов foreach
        unset($value);
        echo 'no_usr';
        return false;
}
auth_users();