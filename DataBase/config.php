<?php

$databaseHost = 'localhost';
$databaseName = 'u955396766_ag';
$databaseUsername = 'u955396766_fagne';
$databasePassword = 'Fic2018@';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$mysqli) {
    die("Erro ao conectar no banco de dados: " . mysqli_connect_error());
    exit();
}

function CheckLogin() {
    if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:.http://www.ficifmt.online/index.php');
    }

    $logado = $_SESSION['login'];
}

?>
