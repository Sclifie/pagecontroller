<?php

function indexAction(){
    $page_title_data = 'Главная';
    $view_file_source   = 'index_view.php';
    sendDataToView($view_file_source, [
        'page_title_data' => $page_title_data
    ]);
}

function cabinetAction(){
    $page_title_data = 'Личный кабинет';
    $view_file_source = 'myauth_view.php';
    sendDataToView($view_file_source, [
        'page_title_data' => $page_title_data
    ]);
}

function myauthAction(){
    echo 'private';
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
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 30.01.2018
 * Time: 0:00
 */