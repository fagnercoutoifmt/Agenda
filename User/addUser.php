<!DOCTYPE html>

<?php
//including the database connection file
include_once("../DataBase/config.php");

if (isset($_POST['Submit'])) {
    $login = mysqli_real_escape_string($mysqli, $_POST['login']);
    $senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

    if (!empty($login) & !empty($senha)) {
        $sql = "insert into User (login, senha) values (\"$login\",\"$senha\")";
        $result = mysqli_query($mysqli, $sql);
        if ($result == false) {
            echo "Error Insert Login";
            echo "<br/>" . mysqli_error($mysqli);
        } else {
            if ($_SESSION['login'] == TRUE) {
                header("Location: http://www.ficifmt.online/User/listUser.php");
            } else {
                header('location:http://www.ficifmt.online/index.php');
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

                    <form method="POST" id="formlogin" name="formlogin" >
                        <fieldset id="fie">
                            <legend>Cadastro de Usuário</legend> <p/>
                            <label>Login :</label>
                            <input type="text" name="login"  id="login"  /><p/>
                            <label>Senha :</label>
                            <input type="password" name="senha"  id="senha" /><p/>
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