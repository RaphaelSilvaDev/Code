<?php
     session_start();
     include 'db.php';

     if(isset($_POST['login_button'])){
        $name = $_POST['name_input_register'];
        $email = $_POST['email_input_register'];
        $pass = $_POST['pass_input_register'];
        $terms = $_POST['terms'];
        unset($_SESSION['terms']);
    
        if($name != null || $name != "")
        {
            if($email != null || $email != "")
            {
                if($pass != null || $pass != "")
                {
                    if($terms)
                    {
                        $dataVerify = "SELECT * FROM users WHERE email = '$email'";
                        $resultVerify = mysqli_query($link, $dataVerify);
                        $result = mysqli_fetch_assoc($resultVerify);
                        if(isset($result))
                        {
                            $_SESSION['emailExist'] = "O email já esta em uso";
                            header ('Location: register.php');
                        }else
                        {
                             unset($_SESSION['emailExist']);
                             $data = "INSERT INTO users (name, email, password) Values('$name','$email','$pass')";
                             $dataResult = mysqli_query($link, $data);
                            if (isset($dataResult))
                            {
                                 $_SESSION['email'] = $email;
                                 $_SESSION['password'] = $pass;
                                $_SESSION['name'] = $name;
                                unset($_SESSION['emailExist']);
                                unset($_SESSION['passInvalid']);
                                unset($_SESSION['emailInvalid']);
                                unset($_SESSION['nameInvalid']);
                                header('Location: index.php');
                            }else{
                                unset ($_SESSION['email']);
                                unset ($_SESSION['password']);
                                unset ($_SESSION['name']);
                                header ('Location: register.php');
                            }
                        }
                    }else{
                        unset($_SESSION['emailExist']);
                        unset($_SESSION['passInvalid']);
                        unset($_SESSION['emailInvalid']);
                        unset($_SESSION['nameInvalid']);
                        header('Location: register.php');
                        $_SESSION['terms'] = "ACEITE OS TERMOS";
                    }
                }else{
                    unset($_SESSION['emailExist']);
                    unset($_SESSION['emailInvalid']);
                    unset($_SESSION['nameInvalid']);
                    header('Location: register.php');
                    $_SESSION['passInvalid'] = "Digite uma senha válida";
                }
            }else{
                unset($_SESSION['emailExist']);
                unset($_SESSION['passInvalid']);
                unset($_SESSION['nameInvalid']);
                header('Location: register.php');
                $_SESSION['emailInvalid'] = "Digite um Email válido";
            }
        }else{
            unset($_SESSION['emailExist']);
            unset($_SESSION['passInvalid']);
            unset($_SESSION['emailInvalid']);
            header('Location: register.php');
            $_SESSION['nameInvalid'] = "Digite um nome válido";
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
    <div id="register_div_rigth">
    <form method="POST">
    <h3><?php 
                if(isset($_SESSION['terms'])){
                    echo $_SESSION['terms'];
                }
                if(isset($_SESSION['passInvalid'])){
                    echo $_SESSION['passInvalid'];
                }
                if(isset($_SESSION['emailInvalid'])){
                    echo $_SESSION['emailInvalid'];
                }
                if(isset($_SESSION['emailExist'])){
                    echo $_SESSION['emailExist'];
                }
                if(isset($_SESSION['nameInvalid'])){
                    echo $_SESSION['nameInvalid'];
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
        <input type="submit" value="Registrar!" id="login_button" name="login_button">
        <h3>Já tenho uma conta, <a href="login.php" onclick="login()">quero usar ela!</h3></a>
        </form>
    </div>
</body>
</html>