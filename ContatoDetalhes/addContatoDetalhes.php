<?php
session_start();
include("../DataBase/config.php");

//edit
if (!empty($_GET['agContatoDetalhesId']) && !empty($_GET['id'])) {

    $idAgenda = $_GET['id'];
    $agContatoDetalhesId = $_GET['agContatoDetalhesId'];
    $rotuloDetalhes = "Atualizar";
    /*
    echo "<br/> idAgenda: $idAgenda";
    echo "<br/> agContatoDetalhesId: $agContatoDetalhesId";
    */

    $sql = "SELECT `agContatosDetalhes`.`agContatoDetalhesId`,`agContatosDetalhes`.`Contato`, `agContatosDetalhes`.`agContatoId`, `agContatosTipo`.`agTipoContatoID` FROM `agContatosDetalhes`, `agContatosTipo` WHERE `agContatosDetalhes`.`agTipoContatoId`= `agContatosTipo`.`agTipoContatoID` and `agContatoDetalhesId`=$agContatoDetalhesId";
    $result = mysqli_query($mysqli, $sql);
    
    while ($aux_query2 = mysqli_fetch_row($result)) {
        $Contato = $aux_query2[1];
        $agTipoContatoId = $aux_query2[3];
    }

    /*echo "<br/> Contato: $Contato";
    echo "<br/> agTipoContatoid: $agTipoContatoId";*/
} else {
    if (!empty($_GET['id'])) {
        $idAgenda = $_GET['id'];
        $rotuloDetalhes = "Inserir";
    } else {
        echo "erro no get[id] - AddContatoDetalhes";
    }
}
?>

<?php
if (isset($_POST['VoltarEditContato'])) {
    $idContato = $_POST['agContatoId'];
    header("Location: http://localhost/Agenda/Contato/editContato.php?id=" . $idContato);
}
?>

<?php
if (isset($_POST['insertContatoDetalhes'])) {
    $Contato = mysqli_real_escape_string($mysqli, $_POST['Contato']);
    $agTipoContatoId = mysqli_real_escape_string($mysqli, $_POST['agTipoContatoId']);
    $agContatoId = $_POST['agContatoId'];

    if (!empty($Contato) && !empty($agTipoContatoId) && !empty($agContatoId)) {
        if ($_POST['insertContatoDetalhes'] == "Inserir") {
            $sql = "INSERT INTO `agContatosDetalhes`(`Contato`, `agContatoId`, `agTipoContatoId`) "
                    . "VALUES (\"$Contato\",\"$agContatoId\",\"$agTipoContatoId\")";
            $result = mysqli_query($mysqli, $sql);
            if ($result == false) {
                echo "Error InsertContatoDetalhes";
                echo "<br/>" . mysqli_error($mysqli);
            } else {
                echo "IDDDD: $agContatoId";
                header("Location: http://localhost/Agenda/ContatoDetalhes/addContatoDetalhes.php?id=" . $agContatoId);
            }
        } else {
            $agContatoDetalhesId = mysqli_real_escape_string($mysqli, $_POST['agContatoDetalhesId']);
            $sql = "UPDATE `agContatosDetalhes` "
                    . "SET `Contato`= \"$Contato\" ,"
                    . "`agContatoId`=\"$agContatoId\","
                    . "`agTipoContatoId`=\"$agTipoContatoId\" "
                    . "WHERE `agContatoDetalhesId` = $agContatoDetalhesId";
            $result = mysqli_query($mysqli, $sql);
            if ($result == false) {
                echo "Error agContatoDetalhesId";
                echo "<br/>" . mysqli_error($mysqli);
            } else {
                //echo "IDDDD: $agContatoId";
                header("Location: http://localhost/Agenda/ContatoDetalhes/addContatoDetalhes.php?id=" . $agContatoId);
            }
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
                        <fieldset> 
                            <legend>Detalhes:</legend>
                            <form method="post" name="formlogin12" action="addContatoDetalhes.php" >
                                <input type="text" hidden="true" name="agContatoId" value="<?php echo $idAgenda ?>"/> 
                                <input type="submit" name="VoltarEditContato" value="Voltar"/> 
                            </form>

                            <form method="POST" name="formlogin12" action="addContatoDetalhes.php" >
                                <label>Contato :</label>
                                <input type="text" hidden="true" name="agContatoDetalhesId" value="<?= $agContatoDetalhesId ?>" />
                                <input type="text" hidden="true" name="agContatoId" value="<?= $idAgenda ?>" />
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
                                <input type="submit" name="insertContatoDetalhes" value="<?= $rotuloDetalhes ?>"/>                               
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
                                               <input type=\"text\" hidden=\"true\" name=\"agContatoDetalhesId\" value=\"<?= $aux_query[0] ?>\" />
                                                <input type=\"text\" hidden=\"true\" name=\"agContatoId\" value=\"<?= $idAgenda ?>\" />
                                
                                                <td class=\"colDir\" style=\"width: 80px;\">
                                                    <button name=\"editarDetalhes\" value=\"$aux_query[0]\" type=\"submit\">
                                                        <span>  
                                                             <a href=\"http://localhost/Agenda/ContatoDetalhes/addContatoDetalhes.php?id=$idAgenda&agContatoDetalhesId=$aux_query[0]\">Edit</a>
                                                        </span>
                                                    </button>                           
                                                </td>
                                                <td class=\"colDir\" style=\"width: 80px;\">                           
                                                    <span>
                                                        <a href=\"http://localhost/Agenda/ContatoDetalhes/deleteContatoDetalhes.php?id=$idAgenda&agContatoDetalhesId=$aux_query[0]\" onClick=\"return confirm('Tem Certeza que quer?')\" >Deletar</a>
                                                    </span>                        
                                               </td>";
                                        echo "</tr>";
                                    }
                                    mysqli_free_result($result);
                                    ?>
                                </tbody>
                            </table>
                        </fieldset> </fieldset>
                </article>
            </section>

            <footer id="rodape">
                <?php include('../Rodape.html'); ?> 
            </footer>
        </div>
    </body>
</html>