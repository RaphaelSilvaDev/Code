<?php
     include 'db.php';
     session_start();

     if(isset($_SESSION['email'])){

     }else{
         header('Location: login.php');
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
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-auth.js"></script>
    <script src="./js/js.js"></script>
</head>
<body>
    <header>
        <img src="./img/smalllogoDark.png" id="logoIndex">
        <form method="GET" id="Search">
        <div id=Search>
            <input type="text" id="searchInput" placeholder="Buscar..."/>
            <button id="btnBusca"><i class="fas fa-search"></i></button> 
        </div>
        </form>
        <form method="POST" action="signout.php" id="out">
        <div id=out>
                <button id="logout_button"><i class="fas fa-sign-out-alt fa-2x"></i></button> 
            </div> 
         </form>
    </header>

    <div id="bodyIndex">

    </div>
</body>
</html>