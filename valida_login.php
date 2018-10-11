<?php
session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

$url = $_SESSION['url'];

include "./DataBase/config.php";

$sql = "SELECT * FROM User where User.login=\"$login\" and User.senha=\"$senha\"";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    header('location:http://www.ficifmt.online/Contato/listContato.php');
} else {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='http://www.ficifmt.online/index.php';</script>";
}
?>