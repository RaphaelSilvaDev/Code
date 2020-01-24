<?php
    include 'db.php';
    session_start();
    $email = $_POST['email_input_login'];
    $pass = $_POST['pass_input_login'];

    $data = mysqli_query($link,"SELECT * FROM 'user' WHERE `email` = '$email' AND `pass` = '$pass'");
    if (mysqli_num_rows($data) > 0){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;
        header('index.php');
    }else{
        unset ($_SESSION['email']);
        unset ($_SESSION['password']);
        header ('login.php');
    }
?>