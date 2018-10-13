<!DOCTYPE html>

<?php
//including the database connection file
include_once("../DataBase/config.php");

if (isset($_POST['Submit'])) {
    $agTitulo = mysqli_real_escape_string($mysqli, $_POST['agTitulo']);
    $agTexto = mysqli_real_escape_string($mysqli, $_POST['agTexto']);
    $agImagem = mysqli_real_escape_string($mysqli, $_POST['agImagem']);
    $agImagemCaption = mysqli_real_escape_string($mysqli, $_POST['agImagemCaption']);
    $agVideo = mysqli_real_escape_string($mysqli, $_POST['agVideo']);

    if (!empty($agTitulo)) {
        $sql = "INSERT INTO `Noticias`(`agTitulo`, `agTexto`, `agImagem`, `agImagemCaption`, `agVideo`) "
                . "VALUES (\"$agTitulo\",\"$agTexto\",\"$agImagem\",\"$agImagemCaption\",\"$agVideo\")";
        $result = mysqli_query($mysqli, $sql);

        if ($result == false) {
            echo "<br/>Error Insert Noticias";
            echo "<br/>" . mysqli_error($mysqli);
        } else {
            header("Location: http://www.ficifmt.online/Noticias/listNoticias.php");
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

                    <form method="POST" id="formlogin" name="formlogin" >
                        <fieldset id="fie">
                            <legend>Inserção de Notícias</legend> <p/>
                            <label>Título :</label>
                            <input style="width: 350px;" type="text" name="agTitulo"  />

                            <p/>

                            <label>Texto :</label><p/>
                            <textarea name="agTexto" id="cMsg" 
                                      cols="100" rows="10" 
                                      placeholder="Deixe aqui sua mensagem!">
                            </textarea><p/>
                            <label>Imagem :</label>
                            <input style="width: 350px;" type="text" name="agImagem"/>

                            <label>Caption :</label>
                            <input style="width: 325px;" type="text" name="agImagemCaption"  />

                            <p/>

                            <label>Vídeo :</label>
                            <input style="width: 760px;" type="text" name="agVideo"  /><p/>

                            <input type="submit" name="Submit" value="Cadastrar"/>
                        </fieldset>
                    </form>  </article>
            </section>

            <footer id="rodape">
                <?php include('../Rodape.html'); ?> 
            </footer>
        </div>
    </body>
</html>