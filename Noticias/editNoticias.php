
<?php
session_start();
include_once("../DataBase/config.php");

if (isset($_POST['update'])) {

    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    $agTitulo = mysqli_real_escape_string($mysqli, $_POST['agTitulo']);
    $agTexto = mysqli_real_escape_string($mysqli, $_POST['agTexto']);
    $agImagem = mysqli_real_escape_string($mysqli, $_POST['agImagem']);
    $agImagemCaption = mysqli_real_escape_string($mysqli, $_POST['agImagemCaption']);
    $agVideo = mysqli_real_escape_string($mysqli, $_POST['agVideo']);


    if (!empty($agTitulo)) {
        $sql = "UPDATE `Noticias` "
                . "SET `agTitulo`=\"$agTitulo\","
                . "`agTexto`=\"$agTexto\","
                . "`agImagem`=\"$agImagem\","
                . "`agImagemCaption`=\"$agImagemCaption\","
                . "`agVideo`=\"$agVideo\""
                . "WHERE `Noticias`.`agNoticiasId`= $id";
        $result = mysqli_query($mysqli, $sql);
        if ($result == false) {
            echo "Error Update editNoticias";
            echo "<br/>" . mysqli_error($mysqli);
        } else {
            header("Location: http://www.ficifmt.online/Noticias/listNoticias.php");
        }
    }
}
?>


<?php
$id = $_GET['id'];

$sql = "SELECT * FROM `Noticias` WHERE `Noticias`.`agNoticiasId`=$id";
$result = mysqli_query($mysqli, $sql);
if ($result == false) {
    echo "Error Update editNoticias";
    echo "<br/>" . mysqli_error($mysqli);
}


while ($res = mysqli_fetch_array($result)) {
    $agTitulo = $res['agTitulo'];
    $agTexto = $res['agTexto'];
    $agImagem = $res['agImagem'];
    $agImagemCaption = $res['agImagemCaption'];
    $agVideo = $res['agVideo'];
}
?>

<!DOCTYPE html>


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
                            <input style="width: 350px;" type="text" name="agTitulo" value="<?= $agTitulo ?>" />

                            <p/>

                            <label>Texto :</label><p/>
                            <textarea  name="agTexto" id="cMsg" 
                                       cols="100" rows="10" 
                                       placeholder="Deixe aqui sua mensagem!"><?= $agTexto ?>
                            </textarea><p/>
                            <label>Imagem :</label>
                            <input style="width: 350px;" type="text" value="<?= $agImagem ?>" name="agImagem"/>

                            <label>Caption :</label>
                            <input style="width: 325px;" type="text"value="<?= $agImagemCaption ?>"  name="agImagemCaption"  />

                            <p/>

                            <label>Vídeo :</label>
                            <input style="width: 760px;" type="text" value="<?= $agVideo ?>" name="agVideo"  /><p/>
                            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                            <input type="submit" name="update" value="Atualizar"/>
                        </fieldset>
                    </form>  </article>
            </section>

            <footer id="rodape">
                <?php include('../Rodape.html'); ?> 
            </footer>
        </div>
    </body>
</html>