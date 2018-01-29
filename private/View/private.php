<?php
session_start();
if (isset($_SESSION['auth']) == true):
    var_dump($_SESSION);
    include 'header.php';
    include 'menu.php' ?>
<p>HELLO</p>
<?php include 'footer.php'; ?>
<?php else: header('location : index.php');  endif;?>


