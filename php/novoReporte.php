<?php

session_start();
include_once("connect.php");

// aqui ele pega todos os dados do forms e no final pega o value do cookie user que definimos
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$problems = filter_input(INPUT_POST, 'problems', FILTER_SANITIZE_STRING);
$grau = filter_input(INPUT_POST, 'grau', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$descri = filter_input(INPUT_POST, 'descri', FILTER_SANITIZE_STRING);
$nomeUser = $_COOKIE['user'];

/*
echo "Cidade: ". $city. "! <br>";
echo "Problema: ". $problems. "! <br>";
echo "Grau do problema: ". $grau. "! <br>";
echo "Rua: ". $rua. "! <br>";
echo "Bairro: ". $bairro. "! <br>";
echo "Descrição: ". $descri. "! <br>";
echo "Nome do autor: ". $nomeUser. "! <br>";
*/

// abaixo faz a verificação se nenhum dos campos está vazio
if ($city == null) {
    echo"<script language='javascript' type='text/javascript'> alert('Escolha uma cidade!');window.location.href='../reports/new_report/new_report.php';</script>";
    die();
}
if ($problems == null) {
    echo"<script language='javascript' type='text/javascript'> alert('Escolha qual é o problema do seu reporte!');window.location.href='../reports/new_report/new_report.php';</script>";
    die();
} 
if ($grau == null) {
    echo"<script language='javascript' type='text/javascript'> alert('Escolha qual grau do problema do seu reporte!');window.location.href='../reports/new_report/new_report.php';</script>";
    die();
} 
if ($rua == null) {
    echo"<script language='javascript' type='text/javascript'> alert('Coloque a rua em que o problema ocorreu!');window.location.href='../reports/new_report/new_report.php';</script>";
    die();
} 
if ($bairro == null) {
    echo"<script language='javascript' type='text/javascript'> alert('Coloque o bairro em que o problema ocorreu!');window.location.href='../reports/new_report/new_report.php';</script>";
    die();
} 
if ($descri == null) {
    echo"<script language='javascript' type='text/javascript'> alert('Coloque uma breve descrição do problema, por favor!');window.location.href='../reports/new_report/new_report.php';</script>";
    die();
} 
// se todos os campos estiverem preenchidos seguimos
else {
    $result_reporte = "INSERT INTO reportes (cidade, problema, grau, rua, bairro, descri, nome_autor) VALUES ('$city', '$problems', '$grau', '$rua', '$bairro', '$descri', '$nomeUser')"; // query que vai por o novo reporte no BD
    #$resultado_reporte = mysqli_query($conn, $result_reporte);

    // aqui vemos se vamos conseguir colocar as infos no BD
    if (mysqli_query($conn, $result_reporte)) {
        // se der certo ele mostrar essas mensagem e redireciona o user para a página de reports
        echo"<script language='javascript' type='text/javascript'> alert('Você cadastrou um novo reporte!'); window.location.href='../reports/reports.php';</script>";
    } else {
        // se der erro ele vai mostrar essa mensagem
        echo "Error: " . $result_reporte . "<br>" . mysqli_error($conn);
    }
}

?>