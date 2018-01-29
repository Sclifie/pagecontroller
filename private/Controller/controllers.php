<?php

function indexAction(){
    include ''
    echo 'index';
}
function authAction(){
    require_once '../private/Model/auth_users.php';
    echo 'auth';
}
function privateAction(){
    echo 'private';
}
/**
 * Created by PhpStorm.
 * User: Sclif
 * Date: 30.01.2018
 * Time: 0:00
 */