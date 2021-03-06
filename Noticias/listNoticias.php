<!DOCTYPE html>

<?php
session_start();
if ((!isset($_SESSION['login']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:http://www.ficifmt.online/index.php');
}

$logado = $_SESSION['login'];
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
                            Lista de Usuários
                        </h1>
                    </header>

                    <form method="POST" action="./addNoticias.php" id="formlogin" name="formlogin" >
                        <input type="submit" name="NovoCadastro" value="Inserir"  /><p/>
                    </form>

                    <table id="tabelaUser">
                        <thead>
                        <th>Código</th>
                        <th>Data</th>
                        <th>Título</th>
                        <th>Texto</th>
                        <th>Editar</th>
                        <th>Deletar</th>
                        </thead>
                        <tbody>
                            <?php
                            include_once("../DataBase/config.php");

                            $sql = "SELECT * FROM `Noticias` ORDER BY `Noticias`.`data` DESC";
                            $result = mysqli_query($mysqli, $sql);

                            $aux_query;
                            while ($aux_query = mysqli_fetch_row($result)) {

                                $date = date_create($aux_query[6]);
                                $dateFormatada = date_format($date, "d/m/Y H:i:s");

                                echo "<tr>
                            <td class=\"colDir\" style=\"width: 80px;\">" . substr($aux_query[0], 0, 10) . "</td>
                             <td class=\"colDir\" style=\"width: 80px;\">" . $dateFormatada . "</td>
                            <td class=\"colDir\" style=\"width: 160px;\"> 
                                <label>" . substr($aux_query[1], 0, 50) . " </label>
                            </td>
                            
                            <td class=\"colDir\" style=\"width: 380px;\">" . substr($aux_query[2], 0, 50) . "</td>
                            
                                <td class=\"colDir\" style=\"width: 80px;\">                            
                                       <span>  
                                             <a href=\"./editNoticias.php?id=$aux_query[0]\">Editar</a>
                                        </span>
                                                        
                                </td>
                                <td class=\"colDir\" style=\"width: 80px;\">                    
                                    
                                        <span>
                                           <a href=\"./deleteNoticias.php?id=$aux_query[0]\" onClick=\"return confirm('Tem Certeza que quer?')\" >Deletar</a>
                                        </span>
                                                      
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