<?php
include "../private/Controller/controllers.php";
function runController() {
    var_dump($_SERVER['REQUEST_URI']);
    var_dump($_SERVER['QUERY_STRING']);
    $uri = parse_url($_SERVER['REQUEST_URI'],
        PHP_URL_PATH);
    $action = trim($uri, '/') ? : 'index';
    $action = $action . 'Action';
    ${$action} = 'Action';
    if (!function_exists($action)) {
        header('Location: /');
    }
    var_dump(function_exists($action));
    var_dump($action);
    $action();
}
runController();
