<?php
require_once 'read_writeJSON.php';
require_once 'filter_array.php';
function user_reg(){
    $post = $_POST['reg_users_data'];
    $post = filterArr($post); //filter_array.php
    unset($value);
    $current_users = unserialize(file_get_contents('..\users_data\users_list.txt'));

    $id_str = 'id_';
    $id_num = count($current_users)+1;
    $id = $id_str . $id_num;


    $json_array = $post;
    $email_check = checkUsers($json_array['userEmail'],'..\users_data\users_list.txt'); //readWriteJSON.php 20

    $login_check = checkUsers($json_array['userLogin'],'..\users_data\users_list.txt'); //readWriteJSON.php 20

    if(isset($json_array['userPhone'])){$phone_check = checkUsers($json_array['userPhone'],'..\users_data\users_list.txt');}
    if($login_check === true){
        if($email_check === true){
                 ${$id} = [
                   'userEmail' => $json_array['userEmail'],
                    'userLogin' => $json_array['userLogin'],
                     'userPassword' => $json_array['userPassword'],
                      'userGroup' => $json_array['userGroup'] = 'user',
                      'userImg' => $json_array['images'] =  'images/' . $id . '.png',
                       'userFrstName' => $json_array['name'] = 'name',
                        'userSurName' => $json_array['sur_name'] = 'name2',
                         'userPhone' => $json_array['phone'] = '+7 911 849 0012'
                ];
                $current_users[$id] = ${$id};
                file_put_contents('../users_data/users_list.txt',serialize($current_users));
            echo 'ok';
            return true;
        } else {echo 'bad_email'; return false;}
    }
    echo 'same_login'; return false;
}
user_reg();
