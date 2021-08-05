<?php 

session_start();
include_once("../php/connect.php");

$nomeUser = $_COOKIE['user'];

?>

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
  <link rel="stylesheet" href="../reports/reports.css">

  <!-- SITE ICON -->
  <link rel="shortcut icon" href="../img/logos site/logo miniatura signaler.png" type="image/x-icon" />

</head>

<body>
  <nav>
    <img src="../img/logos site/logo miniatura signaler.png" alt="logo" id="logo1">

    <a id="my_reports" href="./my_reports/my_reports.php">MEUS REPORTES</a>
  
    <?php 
      echo "<h1 id='user'> $nomeUser </h1>";
    ?>

    <a id="new_report" href="./new_report/new_report.php">NOVO REPORTE</a>

    <img src="../img/logos site/logo miniatura signaler.png" alt="logo" id="logo2">
  </nav>

  <main>
    <div class="container">

      <!-- FORMS DE BUSCA -->
      <form action="../reports/reports.php" method="POST" id="forms_busca">
        <label for="city">Pesquisar uma cidade:</label>
        <select id="city" name="city">
          <option value=""></option>
          <option value="Itápolis">Itápolis</option>
          <option value="Ibitinga">Ibitinga</option>
          <option value="Borborema">Borborema</option>
          <option value="Novo Horizonte">Novo Horizonte</option>
        </select>
        <input type="submit" value="PESQUISAR" id="input_busca">
      </form>

      <?php 

        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);

        if ($city == null) {
          echo "<h4 id='msg'> Para ver os reportes primeiro escolha a cidade acima e clique em pesquisar! </h4>";
        } else {
        $cookie_name = "city";
        $cookie_value = $city;
        $cookieUser = setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        echo "<a href='ver_reportes/ver_reportes.php'> <button type='submit' id='ver_reportes'>  VER REPORTES COMPLETOS </button> </a>";

        # GRAU LEVE
        $result_reportes = "SELECT COUNT(grau) AS total_grau_leve FROM reportes WHERE grau = 'leve' AND cidade = '$city'";
        $resultado_reportes = mysqli_query($conn, $result_reportes);
        $data = mysqli_fetch_assoc($resultado_reportes);
        #echo $data['total'];

        echo "<div class='dados'> <h4>Reportes de grau leve em ".$city.": </h4><span id='span_num_reports'> ". $data['total_grau_leve'] ."</div>";
        # GRAU LEVE

        # GRAU MÉDIO
        $result_reportes = "SELECT COUNT(grau) AS total_grau_medio FROM reportes WHERE grau = 'médio' AND cidade = '$city'";
        $resultado_reportes = mysqli_query($conn, $result_reportes);
        $data = mysqli_fetch_assoc($resultado_reportes);
        #echo $data['total'];

        echo "<div class='dados'> <h4>Reportes de grau médio em ".$city.": </h4><span id='span_num_reports'> ". $data['total_grau_medio'] ."</div>";
        # GRAU MÉDIO

        # GRAU GRAVE
        $result_reportes = "SELECT COUNT(grau) AS total_grau_grave FROM reportes WHERE grau = 'grave' AND cidade = '$city'";
        $resultado_reportes = mysqli_query($conn, $result_reportes);
        $data = mysqli_fetch_assoc($resultado_reportes);
        #echo $data['total'];

        echo "<div class='dados'> <h4>Reportes de grau grave em ".$city.": </h4><span id='span_num_reports'> ". $data['total_grau_grave'] ."</div>";
        # GRAU GRAVE

        # PROBLEMA ARVORE
        $result_reportes = "SELECT COUNT(grau) AS total_prob_arvore FROM reportes WHERE problema = 'Árvore caída' AND cidade = '$city'";
        $resultado_reportes = mysqli_query($conn, $result_reportes);
        $data = mysqli_fetch_assoc($resultado_reportes);
        #echo $data['total'];

        echo "<div class='dados'> <h4>Reportes sobre árvore caída em ".$city.": </h4><span id='span_num_reports'> ". $data['total_prob_arvore'] ."</div>";
        # PROBLEMA ARVORE

        # PROBLEMA FIO
        $result_reportes = "SELECT COUNT(grau) AS total_prob_fio FROM reportes WHERE problema = 'Fio de energia estourado' AND cidade = '$city'";
        $resultado_reportes = mysqli_query($conn, $result_reportes);
        $data = mysqli_fetch_assoc($resultado_reportes);
        #echo $data['total'];

        echo "<div class='dados'> <h4>Reportes sobre fio de energia estourado em ".$city.": </h4><span id='span_num_reports'> ". $data['total_prob_fio'] ."</div>";
        # PROBLEMA FIO

        # PROBLEMA ÁGUA
        $result_reportes = "SELECT COUNT(grau) AS total_prob_agua FROM reportes WHERE problema = 'Vazamento de água' AND cidade = '$city'";
        $resultado_reportes = mysqli_query($conn, $result_reportes);
        $data = mysqli_fetch_assoc($resultado_reportes);
        #echo $data['total'];

        echo "<div class='dados'> <h4>Reportes sobre vazamento de água em ".$city.": </h4><span id='span_num_reports'> ". $data['total_prob_agua'] ."</div>";
        # PROBLEMA ÁGUA

        # PROBLEMA BURACO
        $result_reportes = "SELECT COUNT(grau) AS total_prob_buraco FROM reportes WHERE problema = 'Buraco na rua' AND cidade = '$city'";
        $resultado_reportes = mysqli_query($conn, $result_reportes);
        $data = mysqli_fetch_assoc($resultado_reportes);
        #echo $data['total'];

        echo "<div class='dados'> <h4>Reportes sobre buraco na rua em ".$city.": </h4><span id='span_num_reports'> ". $data['total_prob_buraco'] ."</div>";
        # PROBLEMA BURACO
        }
      ?>

    </div>

  </main>
</body>

</html>