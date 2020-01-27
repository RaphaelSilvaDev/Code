<?php
    include 'db.php';
    session_start();
    $email = $_POST['email_input_login'];
    $pass = $_POST['pass_input_login'];

    $data = "SELECT * FROM users WHERE email = '$email' && password = '$pass'";
    $dataResult = mysqli_query($link, $data);
    $resultado = mysqli_fetch_assoc($dataResult);
    if (isset($resultado)){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;
        header('Location: index.php');
    }else{
        unset ($_SESSION['email']);
        unset ($_SESSION['password']);
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header ('Location: login.php');
    }
?>