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
        if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('location:index.php');
        }

        $logado = $_SESSION['login'];
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
                    <?php include('./Menu.html'); ?> 
                    <h1>
                        Lista de Usuários
                    </h1>
                </header>

                <table id="tabelaUser">
                    <thead>
                    <th>Código</th>
                    <th>Login</th>
                    <th>Senha</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                    </thead>
                    <tbody>
                        <?php
                        include './Conecta_banco.php';

                        $conn = Conectar_Banco();

                        $sql = "SELECT * FROM User ";
                        $result = mysqli_query($conn, $sql);
                        $aux_query;
                        while ($aux_query = mysqli_fetch_row($result)) {
                            echo "<tr>
                            <td class=\"colDir\" style=\"width: 80px;\">" . $aux_query[0] . "</td>
                            <td class=\"colDir\" style=\"width: 380px;\"> 
                                <label>" . $aux_query[1] . " </label>
                            </td>
                            
                            <td class=\"colDir\" style=\"width: 80px;\">" . $aux_query[2] . "</td>
                            <form method=\"POST\">
                                <td class=\"colDir\" style=\"width: 80px;\">                            
                                    <button name=\"editar\" value=\"$aux_query[0]\" src=\"_imagens/login.png\" type=\"submit\">
                                        <span>  
                                            Editar
                                        </span>
                                    </button>                           
                                </td>
                                <td class=\"colDir\" style=\"width: 80px;\">                           
                                    <button name=\"excluir\" value=\"$aux_query[0]\"  type=\"submit\">
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
                <?php
                $excluir = $_POST["excluir"];
                $idUsuario = $_POST["editar"];

                $conn = Conectar_Banco();

                if (isset($excluir)) {
                    $sql = "DELETE FROM User WHERE User.idUsuario = \"$excluir\"";
                    $result = mysqli_query($conn, $sql);
                    $aux_query;
                    echo "<script>window.parent.document.forms[0].submit(); </script>";
                } else {
                    if (isset($idUsuario)) {
                        $_SESSION['idUsuario'] = $idUsuario;
                        echo "<script>document.location='CadastroUsuario.php'</script>";
                        //header("Location: http://localhost/Agenda/CadastroUsuario.php");
                    }
                }
                ?>
            </article>
        </section>
        <footer id="rodape">
            <?php include('./Rodape.html'); ?> 
        </footer>
    </div>
</body>
</html>