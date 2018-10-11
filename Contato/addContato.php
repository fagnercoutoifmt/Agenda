<!DOCTYPE html>

<?php
session_start();
include("../DataBase/config.php");

$idAgenda = $_SESSION['idAgenda'];

if (isset($idAgenda)) {

    $sql = "SELECT * FROM `agContatos` where `agContatos`.`agContatoId` =\"$idAgenda\"";
    $result = mysqli_query($mysqli, $sql);

    while ($aux_query = mysqli_fetch_row($result)) {
        $agContatoId = $aux_query[0];
        $NomeContato = $aux_query[1];
        $estCivil = $aux_query[2];
        $dataNasc = $aux_query[3];
        $lembrarNiver = $aux_query[4];

        $rotulo = "Atualizar";
    }
}
?>

<?php
$excluirDetalhes = $_POST["excluirDetalhes"];
$agContatoDetalhesId = $_POST["editarDetalhes"];
$NomeContato = $_POST['NomeContato'];


if (isset($excluirDetalhes)) {
    $sql = "DELETE FROM `agContatosDetalhes` WHERE `agContatosDetalhes`.`agContatoDetalhesId` = \"$excluirDetalhes\"";
    $result = mysqli_query($conn, $sql);
    $aux_query;
    // echo "<script>window.parent.document.forms[0].submit(); </script>";
} else {
    if (isset($agContatoDetalhesId)) {
        $rotuloDetalhes = "Atualizar";
        $sql = "SELECT `agContatosDetalhes`.`agContatoDetalhesId`,`agContatosDetalhes`.`Contato`, `agContatosDetalhes`.`agContatoId`, `agContatosTipo`.`agTipoContatoID` FROM `agContatosDetalhes`, `agContatosTipo` WHERE `agContatosDetalhes`.`agTipoContatoId`= `agContatosTipo`.`agTipoContatoID` and `agContatoDetalhesId`=$agContatoDetalhesId";
        $result = mysqli_query($conn, $sql);

        while ($aux_query2 = mysqli_fetch_row($result)) {
            $Contato = $aux_query2[1];
            $agTipoContatoId = $aux_query2[3];
        }
        // echo "<script>window.parent.document.forms[0].submit(); </script>";
        //header("Location: http://localhost/Agenda/CadastroUsuario.php");
    }
}
?>

<?php
$inserirDetalhes = $_POST["InserirDetalhes"];

$rotuloDetalhes = $inserirDetalhes;

if (isset($inserirDetalhes)) {
    if (isset($agContatoId) < 0) {
        //criar
    } else {
        $agContatoId = $idAgenda;
    }

    $agContatoDetalhesId = $_POST["agContatoDetalhesId"];
    $Contato = $_POST["Contato"];
    $agTipoContatoId = $_POST["agTipoContatoId2"];


    if ((!empty($Contato)) & (!empty($agTipoContatoId)) & ($rotuloDetalhes == "Cadastrar")) {
        $sql = "INSERT INTO `agContatosDetalhes`(`Contato`, `agContatoId`, `agTipoContatoId`) "
                . "VALUES (\"$Contato\",\"$agContatoId\",\"$agTipoContatoId\")";
        $result = mysqli_query($conn, $sql);
        //   echo "<script>window.parent.document.forms[0].submit(); </script>";
    } else {
        if ((!empty($Contato)) & (!empty($agTipoContatoId)) & ($rotuloDetalhes == "Atualizar")) {
            $sql = "UPDATE `agContatosDetalhes` "
                    . "SET `Contato`= \"$Contato\" ,"
                    . "`agContatoId`=\"$agContatoId\","
                    . "`agTipoContatoId`=\"$agTipoContatoId\" "
                    . "WHERE `agContatoDetalhesId` = $agContatoDetalhesId";
            $result = mysqli_query($conn, $sql);
            //     echo "<script>window.parent.document.forms[0].submit(); </script>";
        }
    }
}
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Tudo sobre o google glass</title>
        <link rel="stylesheet" type="text/css" href="../_css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="../_css/specs.css" />
    </head>
    <body>

        <div id="interface">
            <header id="cabecalho">
                <?php include('../Cabecalho.html'); ?> 
            </header>

            <section id="corpoInteiro">
                <article id="artigoPrincipal">
                    <header id="cabecalhoArtigo">
                        <hgroup>
                            <h1>Cadastro de Usuário</h1>
                            <h2>Usuários</h2>
                        </hgroup>
                    </header>
                    <fieldset id="fie">
                        <legend>Cadastro de Contato</legend> <p/>
                        <form method="POST" id="formlogin" name="formlogin" >
                            <p> <label>Nome :</label>
                                <input type="text" style="width: 760px;" name="NomeContato" value="<?= $NomeContato ?>" id="login"  />
                            <p/>

                            <p> <label for="cData">Data de Nascimento:</label>
                                <input type="date" name="<?= $dataNasc ?>" id="cData" />
                            </p>

                            <p> <label> Estado Civil:</label>
                                <select name="<?= $estCivil ?>" id="cEst">
                                    <option value="Solteiro">Solteiro</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Separado">Separado</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Viúvo">Viúvo</option>
                                </select>
                            </p>

                            <p> <input type="checkbox" name="tPed" id="cPed" checked />
                                <label for="cPed">Lembrar do Aniversário?</label>
                            </p>

                            <p> <input type="submit" name="cadastrar" value="<?= $rotulo ?> "  /></p>
                        </form>    

                        <fieldset> 
                            <legend>Detalhes:</legend>

                            <form method="POST" name="formlogin12" action="editContatoDetalhes.php" >
                                <label>Contato :</label>
                                <input type="text" hidden="true" name="agContatoDetalhesId" value="<?= $agContatoDetalhesId ?>" />
                                <input type="text" style="width: 293px;" name="Contato" value="<?= $Contato ?>" />

                                <label> Tipo Contato:</label>
                                <select name="agTipoContatoId" id="cEst">
                                    <?php
                                    $sql = "SELECT * FROM `agContatosTipo`";
                                    $result = mysqli_query($mysqli, $sql);

                                    while ($aux_query = mysqli_fetch_row($result)) {
                                        if ($aux_query[0] == $agTipoContatoId) {
                                            echo "<option value=\"$aux_query[0]\" selected=\"selected\">$aux_query[1]</option>";
                                        } else {
                                            echo "<option value=\"$aux_query[0]\">$aux_query[1]</option>";
                                        }
                                    }
                                    ?>                  

                                </select>  
                                <input type="submit" name="UpdateDetalhes" value="Atualizar"/>                               
                            </form>

                            <table  id="tabelaUser">
                                <thead>
                                <th>Código</th>
                                <th>Contato</th>
                                <th>Tipo Contato</th>                             
                                <th>Editar</th>
                                <th>Deletar</th>
                                </thead>
                                <tbody>
                                    <?php
                                    include("../DataBase/config.php");
                                    $sql = "SELECT `agContatosDetalhes`.`agContatoDetalhesId`,`agContatosDetalhes`.`Contato`, `agContatosTipo`.`descricao` FROM `agContatosDetalhes`, `agContatosTipo` WHERE `agContatosDetalhes`.`agTipoContatoId`= `agContatosTipo`.`agTipoContatoID` and `agContatosDetalhes`.`agContatoId`= $idAgenda";
                                    $result = mysqli_query($mysqli, $sql);

                                    echo "<p/>";
                                    while ($aux_query = mysqli_fetch_row($result)) {
                                        echo "<tr>
                                        <td class=\"colDir\" style=\"width: 80px;\">" . $aux_query[0] . "</td>
                                        <td class=\"colDir\" style=\"width: 380px;\"> 
                                            <label>" . $aux_query[1] . " </label>
                                        </td>

                                        <td class=\"colDir\" style=\"width: 90px;\">" . $aux_query[2] . "</td>
                                        <form method=\"POST\">
                                            <td class=\"colDir\" style=\"width: 80px;\">                            
                                                <button name=\"editarDetalhes\" value=\"$aux_query[0]\" src=\"_imagens/login.png\" type=\"submit\">
                                                    <span>  
                                                        Editar
                                                    </span>
                                                </button>                           
                                            </td>
                                            <td class=\"colDir\" style=\"width: 80px;\">                           
                                                <button name=\"excluirDetalhes\" value=\"$aux_query[0]\"  type=\"submit\">
                                                    <span>
                                                        Excluir
                                                    </span>
                                                </button>                            
                                            </td>
                                        </form>";
                                        echo "</tr>";
                                    }
                                    mysqli_free_result($result);
                                    ?>
                                </tbody>
                            </table>


                        </fieldset>
                    </fieldset>
                </article>
            </section>

            <footer id="rodape">
                <?php include('../Rodape.html'); ?> 
            </footer>
        </div>
    </body>
</html>