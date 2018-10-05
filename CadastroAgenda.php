<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <title>Tudo sobre o google glass</title>
        <link rel="stylesheet" type="text/css" href="_css/estilo.css" />
        <link rel="stylesheet" type="text/css" href="_css/specs.css" />
    </head>
    <body>

        <?php
        session_start();
        $rotulo = "Cadastrar";
        if ((!isset($_SESSION['idAgenda']) >= 0)) {
            $idAgenda = $_SESSION['idAgenda'];
            include './Conecta_banco.php';
            $conn = Conectar_Banco();

            $NomeContato = "";
            $agContatoId = "";
            $estCivil = "";
            $dataNasc = "";
            $lembrarNiver = "";

            $sql = "SELECT * FROM `agContatos` where `agContatos`.`agContatoId` =\"$idAgenda\"";
            $result = mysqli_query($conn, $sql);
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
        <title>SISTEMA WEB</title>
    </head>

    <div id="interface">
        <header id="cabecalho">
            <?php include('./Cabecalho.html'); ?> 
        </header>

        <section id="corpoInteiro">
            <article id="artigoPrincipal">
                <header id="cabecalhoArtigo">
                    <hgroup>
                        <h1>Cadastro de Usuário</h1>
                        <h2>Usuários</h2>
                    </hgroup>
                </header>

                <form method="POST" id="formlogin" name="formlogin" >
                    <fieldset id="fie">
                        <legend>Cadastro de Contato</legend> <p/>
                        <label>Nome :</label>
                        <input type="text" style="width: 760px;" name="login" value="<?= $NomeContato ?>" id="login"  /><p/>

                        <p> 
                            <label for="cData">Data de Nascimento:</label>
                            <input type="date" name="<?= $dataNasc ?>" id="cData" />
                        </p>

                        <p> <label> Estado:</label>
                            <select name="<?= $estCivil ?>" id="cEst">

                                <option value="PR">Paraná</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="SC">Santa Catarina</option>
                            </select>
                        </p>

                        <p>
                            <input type="checkbox" name="tPed" id="cPed" checked />
                            <label for="cPed">Lembrar do Aniversário?</label>
                        </p>

                        <?php
                        $excluirDetalhes = $_POST["excluirDetalhes"];
                        $agContatoDetalhesId = $_POST["editarDetalhes"];

                        //$conn = Conectar_Banco();

                        if (isset($excluirDetalhes)) {
                            $sql = "DELETE FROM `agContatosDetalhes` WHERE `agContatosDetalhes`.`agContatoDetalhesId` = \"$excluirDetalhes\"";
                            $result = mysqli_query($conn, $sql);
                            $aux_query;
                            echo "<script>window.parent.document.forms[0].submit(); </script>";
                        } else {
                            if (isset($agContatoDetalhesId)) {

                                $sql = "SELECT `agContatosDetalhes`.`agContatoDetalhesId`,`agContatosDetalhes`.`Contato`, `agContatosDetalhes`.`agContatoId`, `agContatosTipo`.`agTipoContatoID` FROM `agContatosDetalhes`, `agContatosTipo` WHERE `agContatosDetalhes`.`agTipoContatoId`= `agContatosTipo`.`agTipoContatoID` and `agContatoDetalhesId`=$idAgenda";
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
                        <fieldset> 
                            <legend>Detalhes:</legend>

                            <form method="POST" name="formlogin12" >
                                <label>Contato :</label>
                                <input type="text" style="width: 293px;" name="Contato" value="<?= $Contato ?>" />

                                <label> Tipo Contato:</label>
                                <select name="<?= $agTipoContatoId ?>" id="cEst">
                                    <option value="1">Paraná</option>
                                    <option value="1">Rio Grande do Sul</option>
                                    <option value="1">Santa Catarina</option>
                                </select>                                   

                                <input type="submit" name="InserirDetalhes" value="Inserir"/>                               
                            </form>

                            <?php
                            $inserirDetalhes = $_POST["InserirDetalhes"];
                            if (isset($agContatoId) < 0) {
                                //criar
                            } else {
                                $agContatoId = $idAgenda;
                                $agTipoContatoId = 1;
                            }

                            $Contato = $_POST["Contato"];


                            if (isset($inserirDetalhes)) {
                                if (!empty($Contato) & !empty($agTipoContatoId)) {
                                    $sql = "INSERT INTO `agContatosDetalhes`(`Contato`, `agContatoId`, `agTipoContatoId`) "
                                            . "VALUES (\"$Contato\",\"$agContatoId\",\"$agTipoContatoId\")";
                                    $result = mysqli_query($conn, $sql);
                                    echo "<script>window.parent.document.forms[0].submit(); </script>";
                                }
                            }
                            ?>

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
                                    echo "$idAgenda";
                                    $sql = "SELECT `agContatosDetalhes`.`agContatoDetalhesId`,`agContatosDetalhes`.`Contato`, `agContatosTipo`.`descricao` FROM `agContatosDetalhes`, `agContatosTipo` WHERE `agContatosDetalhes`.`agTipoContatoId`= `agContatosTipo`.`agTipoContatoID` and `agContatosDetalhes`.`agContatoId`= $idAgenda";
                                    $result = mysqli_query($conn, $sql);
                                    $aux_query;
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

                        <p> <input type="submit" name="cadastrar" value="<?= $rotulo ?> "  /></p>
                    </fieldset>
                </form>                
            </article>
        </section>

        <footer id="rodape">
            <?php include('./Rodape.html'); ?> 
        </footer>
    </div>
</body>
</html>