<?php

include("../DataBase/config.php");

$id = $_GET['id'];

$sql = "DELETE FROM User WHERE idUsuario=\"$id\"";
$result = mysqli_query($mysqli, $sql);

header("Location:http://localhost/Agenda/User/listUser.php");
?>