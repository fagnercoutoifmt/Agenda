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
        if ((!isset($_SESSION['idUsuario']) >= 0)) {
            $idUsuario = $_SESSION['idUsuario'];
            include './Conecta_banco.php';
            $conn = Conectar_Banco();

            $sql = "SELECT * FROM User where User.idUsuario=\"$idUsuario\"";
            $result = mysqli_query($conn, $sql);
            while ($aux_query = mysqli_fetch_row($result)) {
                $usuario = $aux_query[1];
                $senha = $aux_query[2];
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
                        <input type="text" style="width: 760px;" name="login" value="<?= $Contato ?>" id="login"  /><p/>

                        <p> 
                            <label for="cData">Data de Nascimento:</label>
                            <input type="date" name="tData" id="cData" />
                        </p>

                        <p> <label> Estado:</label>
                            <select name="tEst" id="cEst">

                                <option value="PR">Paraná</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="SC">Santa Catarina</option>
                            </select>
                        </p>

                        <fieldset id="sexo"><legend>Sexo:</legend>
                            <input type="radio" name="tSexo" id="cMasc" />
                            <label for="cMasc">Masculino</label><br />
                            <input type="radio" name="tSexo" id="cFem" />
                            <label for="cFem">Feminino</label>
                        </fieldset>

                        <br/>  
                        
                        <?php
                            $excluirDetalhes = $_POST["excluirDetalhes"];
                            $idUsuario = $_POST["editarDetalhes"];
 
                            //$conn = Conectar_Banco();

                            if (isset($excluirDetalhes)) {
                                $sql = "DELETE FROM `agContatosDetalhes` WHERE `agContatosDetalhes`.`agContatoDetalhesId` = \"$excluirDetalhes\"";
                                $result = mysqli_query($conn, $sql);
                                $aux_query;
                                echo "<script>window.parent.document.forms[0].submit(); </script>";
                            } else {
                                if (isset($idUsuario)) {

                                    $sql = "SELECT `agContatosDetalhes`.`agContatoDetalhesId`,`agContatosDetalhes`.`Contato`, `agContatosDetalhes`.`agContatoId`, `agContatosTipo`.`agTipoContatoID` FROM `agContatosDetalhes`, `agContatosTipo` WHERE `agContatosDetalhes`.`agTipoContatoId`= `agContatosTipo`.`agTipoContatoID` and `agContatoDetalhesId`=$idUsuario";
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
                                <select name="c" id="cEst">
                                    <option value="PR">Paraná</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="SC">Santa Catarina</option>
                                </select>                                   

                                <input type="submit" name="InserirDetalhes" value="Inserir"/>                               
                            </form>

                            <?php
                            $inserirDetalhes = $_POST["InserirDetalhes"];
                            $agContatoId = 1;
                            $Contato = $_POST["Contato"];
                            $agTipoContatoId = 1;

                            if (isset($inserirDetalhes)) {
                                if (!empty($Contato) & !empty($tipoContato)) {
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
                                    $sql = "SELECT `agContatosDetalhes`.`agContatoDetalhesId`,`agContatosDetalhes`.`Contato`, `agContatosTipo`.`descricao` FROM `agContatosDetalhes`, `agContatosTipo` WHERE `agContatosDetalhes`.`agTipoContatoId`= `agContatosTipo`.`agTipoContatoID`";
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
                <!--
                <?php /*
                  $usuario = $_POST['login'];
                  $senha = $_POST['senha'];
                  $cadastrar = $_POST['cadastrar'];


                  if (isset($cadastrar)) {
                  if (!empty($usuario) & !empty($senha)) {
                  if ($idUsuario >= 0) {
                  $sql = "UPDATE `User` SET login=\"$usuario\",senha=\"$senha\" WHERE idUsuario= $idUsuario";
                  $result = mysqli_query($conn, $sql);
                  $idUsuario = -1;
                  $_SESSION['idUsuario'] = $idUsuario;
                  header('location:site.php');
                  } else {
                  $sql = "insert into User (login, senha) values (\"$usuario\",\"$senha\")";
                  $result = mysqli_query($conn, $sql);
                  header('location:index.php');
                  }
                  } else {
                  echo"<script language='javascript' type='text/javascript'>alert('Campos em brancos');window.location.href='cadUsuario.php';</script>";
                  }
                  }
                 */ ?>-->
            </article>
        </section>

        <footer id="rodape">
            <?php include('./Rodape.html'); ?> 
        </footer>
    </div>
</body>
</html>