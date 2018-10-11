<?php
$databaseHost = 'localhost';
$databaseName = 'u955396766_ag';
$databaseUsername = 'root';
$databasePassword = '159753';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$mysqli) {
    die("Erro ao conectar no banco de dados: " . mysqli_connect_error());
    exit();
}else{
    echo "conectado";
}

//mysql://mysql:3306/

?>
