<!DOCTYPE html>

<?php
session_start();
include("../DataBase/config.php");
CheckLogin();
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
                        <?php include('../Menu.html'); ?> 
                        <h1>
                            Lista de Contatos
                        </h1>
                    </header>

                    <form method="POST" action="./editContato.php" id="formlogin" name="formlogin" >
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
                            $sql = "SELECT * FROM `agContatos`";
                            $result = mysqli_query($mysqli, $sql);

                            while ($aux_query = mysqli_fetch_row($result)) {
                                echo "<tr>
                                <td class=\"colDir\" style=\"width: 80px;\">" . $aux_query[0] . "</td>
                                <td class=\"colDir\" style=\"width: 380px;\"> 
                                    <label>" . $aux_query[1] . " </label>
                                </td>
                            
                                <td class=\"colDir\" style=\"width: 90px;\">" . $aux_query[2] . "</td>
                                <td class=\"colDir\" style=\"width: 90px;\">" . $aux_query[3] . "</td>
                                <td class=\"colDir\" style=\"width: 80px;\">                            
                                    <span>  
                                        <a href=\"./editContato.php?id=$aux_query[0]\">Edit</a>
                                    </span>                        
                                </td>
                                <td class=\"colDir\" style=\"width: 80px;\">                           
                                    <span>
                                        <a href=\"./deleteContato.php?id=$aux_query[0]\" onClick=\"return confirm('Tem Certeza que quer?')\" >Deletar</a>
                                    </button>                            
                                </td>";
                                echo "</tr>";
                            }
                            mysqli_free_result($result);
                            ?>
                        </tbody>
                    </table>


                </article>
            </section>
            <footer id="rodape">
<?php include('../Rodape.html'); ?> 
            </footer>
        </div>
    </body>
</html>