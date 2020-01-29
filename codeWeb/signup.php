<?php
    include 'db.php';
    session_start();
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
?>