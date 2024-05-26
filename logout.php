<?php 
session_start();
if(isset($_COOKIE['prod_ids'])) {
    unset($_COOKIE['prod_ids']);
    setcookie('prod_ids', '', time() - 3600, '/');
}
session_destroy();
header("Location: login.html");
?>