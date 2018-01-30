<?php
include "../private/Controller/controllers.php";
function runController() {
    $uri = parse_url($_SERVER['REQUEST_URI'],
        PHP_URL_PATH);
    var_dump($uri);
    $action = trim($uri, '/') ? : 'index';
    var_dump($action);
    $action = $action . 'Action';
    ${$action} = 'Action';
    if (!function_exists($action)) {
        header('Location: /');
    }
    var_export($action);
    var_dump(function_exists(blogAction));
    var_dump(function_exists(myauthAction));
    $action();
}
runController();
