<?php

session_start();

function deleteAgContatos($idAgContatos) {
    $sql = "DELETE FROM `agContatos` WHERE `agContatos`.`agContatoId` = \"$idAgContatos\"";
    $conn = Conectar_Banco();
    return mysqli_query($conn, $sql);
}

include './Conecta_banco.php';

$idAgendaExcluir = $_POST["idAgendaExcluir"];
$idAgendaEdit = $_POST["idAgendaEdit"];
$idNovoCadastro = $_POST["NovoCadastro"];

if (isset($idAgendaExcluir)) {
    if (deleteAgContatos($idAgendaExcluir)) {
        echo "Excluido";
    } else {
        echo "Erro";
    }

    header('location: ./Agenda.php');
} else {
    if (isset($idAgendaEdit)) {
        $_SESSION['isEdit'] = true;
        $_SESSION['idAgenda'] = $idAgendaEdit;
        echo "<script>document.location='CadastroAgenda.php'</script>";
    } else {
        if (isset($idNovoCadastro)) {
            $sql = "INSERT INTO `agContatos`(`estCivil`, `lembrarNiver`) VALUES (\"Solteiro\",1)";
            $conn = Conectar_Banco();
            $result = mysqli_query($conn, $sql);
            $_SESSION['idAgenda'] = mysqli_insert_id($conn);
            $_SESSION['isEdit'] = false;
            echo "<script>document.location='CadastroAgenda.php'</script>";
        }
    }
}

