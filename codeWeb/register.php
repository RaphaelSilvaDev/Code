<?php
     session_start();
     include 'db.php';
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
        <form method="post" action="sigin.php" id="formLogin">
            <img src="./img/logoDark.png" id="logo">
        </div>
    <div id="register_div_rigth">
    <form method="POST" action="signup.php">
    <h3><?php 
                if(isset($_SESSION['terms'])){
                    echo $_SESSION['terms'];
                }
            ?></h3>
        <h1>Bem vindo ao Code!</h1>
        <h2>Faça seu registro para utilizar o serviço!</h2>
        <input type="name" name="name_input_register" id="name_input_register" placeholder="Nome...">
        <br>
        <input type="email" name="email_input_register" id="email_input_register" placeholder="Email...">
        <br>
        <input type="password" name="pass_input_register" id="pass_input_register" placeholder="Senha...">
        <br>
        <label class="Container">
            <input type="checkbox" name="terms" id="terms">
            <span class="checkmark"></span><a href="#">Eu aceito os Termos de Uso!</a>
        </label>
        <br><br>
        <button id="login_button"">Registrar!</button>
        <h3>Já tenho uma conta, <a href="login.php" onclick="login()">quero usar ela!</h3></a>
        </form>
    </div>
</body>
</html>