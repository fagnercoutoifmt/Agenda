
<?php

/*
  include("../DataBase/config.php");

  $sql = "SELECT `agContatosDetalhes`.`agContatoDetalhesId`,`agContatosDetalhes`.`Contato`, `agContatosDetalhes`.`agContatoId`, `agContatosTipo`.`agTipoContatoID` FROM `agContatosDetalhes`, `agContatosTipo` WHERE `agContatosDetalhes`.`agTipoContatoId`= `agContatosTipo`.`agTipoContatoID` and `agContatoDetalhesId`=$agContatoDetalhesId";
  $result = mysqli_query($mysqli, $sql);

  while ($aux_query2 = mysqli_fetch_row($result)) {
  $agContatoDetalhesId = $aux_query2[0];
  $Contato = $aux_query2[1];
  $agTipoContatoId = $aux_query2[3];
  } */
?>

<?php

include("../DataBase/config.php");

if (isset($_POST['UpdateDetalhes'])) {

    $agContatoId = $_POST['agContatoId'];
    $Contato = mysqli_real_escape_string($mysqli, $_POST['Contato']);
    $agTipoContatoId = mysqli_real_escape_string($mysqli, $_POST['agTipoContatoId']);

    if ((!empty($Contato)) & (!empty($agTipoContatoId))) {
        $sql = "INSERT INTO `agContatosDetalhes`(`Contato`, `agContatoId`, `agTipoContatoId`) "
                . "VALUES (\"$Contato\",\"$agContatoId\",\"$agTipoContatoId\")";
        $result = mysqli_query($mysqli, $sql);
        if ($result == false) {
            echo "Error UpdateDetalhes [editContatoDetalhes]";
            echo "<br/>" . mysqli_error($mysqli);
        } else {
            require_once 'http://www.ficifmt.online/Contato/editContato.php';
         // header('location:http://localhost/Agenda/Contato/editContato.php?id=' . $agContatoId);
        }
    }
}
?>
