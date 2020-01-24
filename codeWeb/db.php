<?php
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "codedb";
    $link = mysqli_connect($host, $user, $pass);
    mysqli_select_db($link, $db) or die (mysqli_error());
?>