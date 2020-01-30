<?php
     session_start();
     include 'db.php';

     if(isset($_POST['login_button'])){
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
    }
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code</title>
    <link rel="icon" href="./img/smallLogoColor.png">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400,500,700&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="./css/css.css">
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-auth.js"></script>
    <script src="./js/js.js"></script>
</head>
<body>
    <div id="login_div_left">
            <div>
                <img src="./img/logoDark.png" id="logo">
            </div>
    </div>
    <div id="login_div_rigth">~
        <form method="post" id="formLogin">
            <h3><?php 
                if(isset($_SESSION['loginErro'])){
                    echo $_SESSION['loginErro'];
                }
            ?></h3>
            <h1>Bem vindo ao Code!</h1>
            <h2>Faça seu login para continuar</h2>
            <input type="email" name="email_input_login" id="email_input_login" placeholder="Email...">
            <br>
            <input type="password" name="pass_input_login" id="pass_input_login" placeholder="Senha...">
            <br>
            <input type="submit" value="Entrar!" id="login_button" name="login_button">
          <h3>Ainda não tenho conta, <a href="register.php" onclick="register()">quero criar uma!</h3></a>
        </form>
    </div>
</body>
</html>