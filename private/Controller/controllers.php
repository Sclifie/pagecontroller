<?php
require_once '../private/data/scripts.php'; //массив с линками для скриптов
function indexAction(){
    $login_data = checkSession();
    $page_title_data = 'Главная';
    $view_file_source   = 'index_view.php';
    sendDataToView($view_file_source, [
        'page_title_data' => $page_title_data,
        'login_name_data' => $login_data[0],
        'login_auth_data' => $login_data[1]
    ]);
}

function cabinetAction(){
    $page_title_data = 'Личный кабинет';
    $view_file_source = 'auth_view.php';
    sendDataToView($view_file_source, [
        'page_title_data' => $page_title_data
    ]);
}

function authAction(){
    if(isset($_POST['reg_users_data='])){
        include_once '../Model/auth_users.php';
        echo 'хаха';
    }
    $page_title_data = 'Авторизация | Регистрация';
    $view_file_source = 'auth_view.php';
    sendDataToView($view_file_source,[
        'page_title_data' => $page_title_data
    ]);
}

function blogAction(){
    $page_title_data = 'Блог';
    $view_file_source = 'blog_view.php';
    sendDataToView($view_file_source,[
        'page_title_data' => $page_title_data
    ]);
}

function sendDataToView($view_file_source,$page_variables){
    if(is_array($page_variables)){
        extract($page_variables);
    }
    require_once "../private/View/my_template.php";
}

function checkSession(){
    if (isset($_SESSION['auth']) && $_SESSION['auth'] === true){
        $login_name_data = $_SESSION['login'];
        $auth_status_data = true;
        return [$login_name_data,$auth_status_data];
    }
    return false;
}
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 30.01.2018
 * Time: 0:00
 */