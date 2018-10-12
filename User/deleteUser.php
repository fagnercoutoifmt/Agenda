<?php

include("../DataBase/config.php");
CheckLogin();

$id = $_GET['id'];

$sql = "DELETE FROM User WHERE idUsuario=\"$id\"";
$result = mysqli_query($mysqli, $sql);

header("Location:http://www.ficifmt.online/User/listUser.php");
?>
