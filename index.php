<?php

// Iniciando a sessão e incluindo o arquivo com infos do BD 
session_start();
include_once("./php/connect.php")

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HTML, CSS, Reports">
    <meta name="description" content="Site para report de problemas urbanos">
    <meta name="author" content="Luigi, Fellipe, Giovana, Gustavo e Patrick">

    <title>Signaler - TCC</title>

    <!-- FONTE - POPPINS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="./style.css">

    <!-- SITE ICON -->
    <link rel="shortcut icon" href="./img/logos site/logo miniatura signaler.png" type="image/x-icon" />
</head>

<body>
    <main class="container">
        <section>
            <!-- logo -->
            <img src="./img/logos site/logo miniatura signaler.png" alt="logo" id="logo">

            <!-- title - name project -->
            <img src="./img/logos site/logo signaler.png" alt="Logo - nome projeto" id="title_logo">

            <!-- logo 2-->
            <img src="./img/logos site/logo miniatura signaler.png" alt="logo" id="logo2">

            <!-- element - linha -->
            <hr id="linha_titles">
            </hr>

            <!-- subtitle -->
            <div class="subtitle">
                <h2>Aplicação com foco na eficiência e rapidez de reportes de problemas urbanos</h2>
            </div>
        </section>


        <!-- forms -->
        <div id="forms_cad_log">
            <form method="POST" action="./php/login.php">
                <h3 class="title_forms"> ENTRAR </h3>
                <input type="text" name="login" id="login" placeholder="digite o nome de seu usuário">
                <br>
                <input type="password" name="senha" id="senha" placeholder="digite a sua senha">
                <br>
                <br>
                <button type="submit" value="entrar" id="entrar" name="entrar" class="forms_button"> LOGIN </button>
                <hr id="linha_forms">
                </hr>
            </form>

            <form method="POST" action="./php/cadastro.php">
                <h3 class="title_forms"> CADASTRAR </h3>
                <input type="text" name="login" id="login" placeholder="digite o nome de seu usuário">
                <br>
                <input type="password" name="senha" id="senha" placeholder="digite a sua senha">
                <br>
                <br>
                <button type="submit" value="cadastrar" id="cadastrar" name="cadastrar" class="forms_button"> CADASTRAR </button>
            </form>
        </div>

        <!-- button creators -->
        <a href="./creators/creators.html">
            <button id="creators">
                CRIADORES
            </button>
        </a>
    </main>
</body>

</html>