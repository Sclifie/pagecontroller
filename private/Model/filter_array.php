<?php
// тут можно и нужно дальше как-то фильтровать, но не знаю как и что
function filterArr($post)
{
    $post = (json_decode($post, true, 5, 0));
    $post = str_replace(' ', '', $post);

    foreach ($post as &$value) {
        $value = trim($value, " \t\n\r\0\x0B");
        $value = strip_tags($value);
        $value = htmlspecialchars($value);
        if (strripos($value, '<?', 0) !== false) {
            echo 'попытка внедрения PHP';
            return false;
        }
        unset($value);
    }
    return $post;
}