<?php

include("../DataBase/config.php");
CheckLogin();

$id = $_GET['id'];

$sql = "DELETE FROM `agContatos` WHERE `agContatos`.`agContatoId` = \"$id\"";
$result = mysqli_query($mysqli, $sql);

if ($result == false) {
    echo "Error Update Login";
    echo "<br/>" . mysqli_error($mysqli);
} else {
    header("Location:http://www.ficifmt.online/Contato/listContato.php");
}
?>
