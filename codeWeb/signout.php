<?php
    include 'db.php';
    session_start();
    if (isset($_SESSION['email'])){
        unset ($_SESSION['email']);
        unset ($_SESSION['password']);
        unset ($_SESSION['loginErro']);
        header ('Location: login.php');
    }
?>