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
            header('location:./index.php');
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
                        Lista de Contatos
                    </h1>
                </header>

                <form method="POST" action="./formAgenda.php" id="formlogin" name="formlogin" >
                    <input type="submit" name="NovoCadastro" value="Inserir"  /><p/>
                </form>   



                <table id="tabelaUser">
                    <thead>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Estado Civil</th>
                    <th>Data Nasc.</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                    </thead>
                    <tbody>
                        <?php
                        include './AgendaMenager.php';
                        $result = getAgContatos();

                        while ($aux_query = mysqli_fetch_row($result)) {
                            echo "<tr>
                            <td class=\"colDir\" style=\"width: 80px;\">" . $aux_query[0] . "</td>
                            <td class=\"colDir\" style=\"width: 380px;\"> 
                                <label>" . $aux_query[1] . " </label>
                            </td>
                            
                            <td class=\"colDir\" style=\"width: 90px;\">" . $aux_query[2] . "</td>
                            <td class=\"colDir\" style=\"width: 90px;\">" . $aux_query[3] . "</td>
                            <form method=\"POST\" action=\"./formAgenda.php\" id=\"formAgenda\">
                                <td class=\"colDir\" style=\"width: 80px;\">                            
                                    <button name=\"idAgendaEdit\" value=\"$aux_query[0]\" src=\"_imagens/login.png\" type=\"submit\">
                                        <span>  
                                            Editar
                                        </span>
                                    </button>                           
                                </td>
                                <td class=\"colDir\" style=\"width: 80px;\">                           
                                    <button name=\"idAgendaExcluir\" value=\"$aux_query[0]\"  type=\"submit\">
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


            </article>
        </section>
        <footer id="rodape">
            <?php include('./Rodape.html'); ?> 
        </footer>
    </div>
</body>
</html>