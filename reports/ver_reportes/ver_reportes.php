<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="HTML, CSS, Reports">
  <meta name="description" content="Site para report de problemas urbanos">
  <meta name="author" content="Luigi, Fellipe, Giovana, Gustavo e Patrick">

  <title>Signaler - TCC</title>

  <!-- FONTE - POPPINS -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="ver_reportes.css">

  <!-- SITE ICON -->
  <link rel="shortcut icon" href="../../img/logos site/logo miniatura signaler.png" type="image/x-icon"/>

</head>

<body>
<div class="container">
    <?php

    session_start();
    include_once("../../php/connect.php");

    $city = $_COOKIE['city'];

    #echo $city;

    //receber o número da página
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    //seta a quantidade de itens por pagina
    $qnt_result_pg = 2;

    //calcular o inicio da visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    #$result_reportes = "SELECT * FROM reportes WHERE cidade='$city'";
    $result_reportes = "SELECT * FROM reportes WHERE cidade='$city' LIMIT $inicio, $qnt_result_pg";
    $resultado_reportes = mysqli_query($conn, $result_reportes);

    while($row_reporte = mysqli_fetch_assoc($resultado_reportes)){
        echo "<div class='reports'> <h3>Autor: <span>".$row_reporte['nome_autor']."</span></h3> <h3>Cidade: <span>".$row_reporte['cidade']."</span></h3> <h3>Problema: <span>".$row_reporte['problema']."</span></h3> <h3>Grau do problema: <span>".$row_reporte['grau']."</span></h3> <h3>Rua: <span>".$row_reporte['rua']."</span></h3> <h3>Bairro: <span>".$row_reporte['bairro']."</span></h3> <h3>Descrição: <span>".$row_reporte['descri']."</span></h3> </div>";
    }

    //paginação - somar a quantidade de reportes
    $result_pg = "SELECT COUNT(id_reporte) AS num_result FROM reportes WHERE cidade='$city'";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    //echo $row_pg['num_result'];

    //quantidade páginas
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
?>

</div>

<div id="pages">
<?php
    //limitar os links antes depois
    $max_links = 2;
    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if ($pag_ant >= 1){
            echo"<a id='page' href='ver_reportes.php?pagina=$pag_ant'> $pag_ant </a>";
        }
    }

    echo"<a id='page_select'> $pagina </a>";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $quantidade_pg){    
            echo"<a id='page' href='ver_reportes.php?pagina=$pag_dep'> $pag_dep </a>";
        }
    }
?>
</div>


<a href="../reports.php" id="btn-voltar"> 
    <button>VOLTAR</button> 
</a> 


</body>

</html>