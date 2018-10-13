<?php

include("../DataBase/config.php");

$id = $_GET['id'];

$sql = "DELETE FROM `Noticias` WHERE `Noticias`.`agNoticiasId`=\"$id\"";
$result = mysqli_query($mysqli, $sql);

if ($result == false) {
    echo "<br/>Error DELETE FROM `Noticias`";
    echo "<br/>" . mysqli_error($mysqli);
} else {
    header("Location:http://www.ficifmt.online/Noticias/listNoticias.php");
}
?>
