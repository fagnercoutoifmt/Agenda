
<?php
session_start();
include_once("../DataBase/config.php");
CheckLogin();

if (isset($_POST['update'])) {

    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    $login = mysqli_real_escape_string($mysqli, $_POST['login']);
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

    if (!empty($login) & !empty($senha)) {
        $sql = "UPDATE `User` SET login=\"$login\",senha=\"$senha\" WHERE idUsuario= $id";
        $result = mysqli_query($mysqli, $sql);
        if ($result == false) {
            echo "Error Update Login";
            echo "<br/>" . mysqli_error($mysqli);
        } else {
            header("Location: http://www.ficifmt.online/User/listUser.php");
        }
    }
}
?>


<?php
$id = $_GET['id'];

$sql = "SELECT * FROM User where User.idUsuario=\"$id\"";
$result = mysqli_query($mysqli, $sql);

while ($res = mysqli_fetch_array($result)) {
    $login = $res['login'];
    $senha = $res['senha'];
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

                    <form method="POST" id="formlogin" name="formlogin"  action="./editUser.php">
                        <fieldset id="fie">
                            <legend>Cadastro de Usuário</legend> <p/>
                            <label>Login :</label>
                            <input type="text" name="login" value="<?php echo $login; ?>" id="login"  /><p/>
                            <label>Senha :</label>
                            <input type="password" name="senha" value="<?php echo $senha; ?>" id="senha" /><p/>
                            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                            <input type="submit" name="update" value="Atualizar"  />
                        </fieldset>
                    </form>


                </article>
            </section>

            <footer id="rodape">
                <?php include('../Rodape.html'); ?> 
            </footer>
        </div>
    </body>
</html>