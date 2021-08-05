<?php

session_start();
include_once("connect.php");

$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_EMAIL);
$entrar = $_POST['entrar'];

if (empty($login)){
  echo"<script language='javascript' type='text/javascript'>
  alert('Você esqueceu de por um NOME para logar!');
  window.location.href='../index.php';</script>";
  return;
}

if (empty($senha)){
  echo"<script language='javascript' type='text/javascript'>
  alert('Você esqueceu de por uma SENHA para logar!');
  window.location.href='../index.php';</script>";
  return;
}

if (isset($entrar)) {
    $verifica = mysqli_query($conn, "SELECT * FROM usuarios WHERE login = ('$login') AND senha = ('$senha')");
      if (mysqli_num_rows($verifica) <= 0) {
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='../index.php';</script>";
        die();
      } else { 
        echo"<script language='javascript' type='text/javascript'>
        alert('Sucesso, você logou em uma conta!');window.location
        .href='../reports/reports.php';</script>";

        $cookie_name = "user";
        $cookie_value = $login;
        $cookieUser = setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
      }
  }
?>