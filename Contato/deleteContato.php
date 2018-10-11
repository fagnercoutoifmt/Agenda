<?php

include("../DataBase/config.php");

$id = $_GET['id'];

$sql = "DELETE FROM `agContatos` WHERE `agContatos`.`agContatoId` = \"$id\"";
$result = mysqli_query($mysqli, $sql);

if ($result == false) {
    echo "Error Update Login";
    echo "<br/>" . mysqli_error($mysqli);
} else {
    header("Location:http://localhost/Agenda/Contato/listContato.php");
}
?>
