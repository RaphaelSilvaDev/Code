<?php
    include 'db.php';
    session_start();
    $name = $_POST['name_input_register'];
    $email = $_POST['email_input_register'];
    $pass = $_POST['pass_input_register'];
    $terms = $_POST['terms'];

    if($name != null || $name != ""){
        if($email != null || $email != ""){
            if($pass != null || $pass != ""){
                if($terms){
                    $data = "INSERT INTO users (name, email, password) Values('$name','$email','$pass')";
                    $dataResult = mysqli_query($link, $data);
                    if (isset($dataResult)){
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $pass;
                        $_SESSION['name'] = $name;
                        unset($_SESSION['terms']);
                        header('Location: index.php');
                    }else{
                        unset ($_SESSION['email']);
                        unset ($_SESSION['password']);
                        unset ($_SESSION['name']);
                        $_SESSION['loginErro'] = "Aconteceu algum erro inesperado, tente novamente";
                        header ('Location: login.php');
                    }
                }else{
                    header('Location: login.php');
                    $_SESSION['terms'] = "ACEITE OS TERMOS";
                }
            }else{
                echo "Digite uma senha válida";
            }
        }else{
            echo "Digite um email Válido";
        }
    }else{
        echo "Digite um nome Válido";
    }
            

?>