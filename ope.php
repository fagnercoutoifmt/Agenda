<?php

function Conectar_Banco() {

    $dbhost = getenv("MYSQL_SERVICE_HOST"); // Host name 
    $dbport = getenv("MYSQL_SERVICE_PORT"); // Host port
    $dbusername = getenv("MYSQL_USER"); // MySQL username 
    $dbpassword = getenv("MYSQL_PASSWORD"); // MySQL password 
    $db_name = getenv("MYSQL_DATABASE"); // Database name 


    $conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $db_name,$dbport);
    if (!$conn) {
        die("Erro ao conectar no banco de dados:<br/> " . mysqli_connect_error());
        exit();
    }
    return $conn;
}

// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior

$login = $_POST['login'];
$senha = $_POST['senha'];
// as próximas 3 linhas são responsáveis em se conectar com o bando de dados.

$url = $_SESSION['url'];

//include "Conecta_banco.php";

$conn = Conectar_Banco();
// A variavel $result pega as varias $login e $senha, faz uma 
//pesquisa na tabela de usuarios

$sql = "SELECT * FROM User where User.login=\"$login\" and User.senha=\"$senha\"";
$result = mysqli_query($conn, $sql);
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi 
  bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
  será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do
  resultado ele redirecionará para a página site.php ou retornara  para a página
  do formulário inicial para que se possa tentar novamente realizar o login */

if (mysqli_num_rows($result) > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:Agenda.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    //header('location:index.php');
    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
}
?>