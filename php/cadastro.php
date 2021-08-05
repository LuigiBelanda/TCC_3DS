<?php

session_start();
include_once("connect.php"); // arquivo com a conexão com o BD

/* Pegando os dados que o user colocou nos inputs da página */
$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

/* Verificando se nenhum dos inputs é vázio */
if (empty($login)){
  echo"<script language='javascript' type='text/javascript'> alert('Você esqueceu de por um NOME para sua conta!'); window.location.href='../index.php';</script>";
}

if (empty($senha)){
  echo"<script language='javascript' type='text/javascript'> alert('Você esqueceu de por uma SENHA para sua conta!'); window.location.href='../index.php';</script>";
}

/* Verificando se já existe algum user com o nome que a pessoa quer usar */
$pesquisa_cad = mysqli_query($conn, "SELECT COUNT(*) FROM usuarios WHERE login = '{$login}'"); // busca no banco quantos id tem com o nome que o user que usar
$row = $pesquisa_cad -> fetch_row();
if ($row[0] > 0) {
  // caso seja encontrado algo registro com o nome ele irá mostrar esse alert
  echo"<script language='javascript' type='text/javascript'> alert('Este nome já está cadastrado! Escolha outro nome, por favor.'); window.location.href='../index.php'</script>";
} 

// caso o nome ainda não tenha sido usado ele segue
else {
  $result_usuario = "INSERT INTO usuarios (login, senha) VALUES ('$login', '$senha')"; // query que vai por as infos no BD
  $resultado_usuario = mysqli_query($conn, $result_usuario); 

  // aqui vemos se conseguimos cadastrar ou não o user
  if(mysqli_insert_id($conn)){
    // se o user fos cadastrado com sucesso ele solta alert e redireciona ele para a página de reports
    echo "<script language='javascript' type='text/javascript'> alert('Você acabou de cadastrar uma nova conta!'); window.location.href='../reports/reports.php'</script>";
  
    // também setamos um cookie com o nome "user" onde guardamos o nome da conta que logou
    $cookie_name = "user";
    $cookie_value = $login;
    $cookieUser = setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  } else {
    // caso de algum erro ele solta esse alert
    echo "<script language='javascript' type='text/javascript'> alert('Ocorreu algum erro! Tente novamente!'); window.location.href='../index.php'</script>";
  }
}

?>