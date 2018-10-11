<?php

include("../DataBase/config.php");

$agContatoDetalhesId = $_GET['agContatoDetalhesId'];
$id = $_GET['id'];

$sql = "DELETE FROM `agContatosDetalhes` WHERE `agContatosDetalhes`.`agContatoDetalhesId` = \"$agContatoDetalhesId\"";
$result = mysqli_query($mysqli, $sql);

header("Location:http://www.ficifmt.online/ContatoDetalhes/addContatoDetalhes.php?id=$id");
?>
