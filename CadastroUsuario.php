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
                        <legend>Cadastro de Usuário</legend> <p/>
                        <label>Login :</label>
                        <input type="text" name="login" value="<?= $usuario ?>" id="login"  /><p/>
                        <label>Senha :</label>
                        <input type="password" name="senha" value="<?= $senha ?>" id="senha" /><p/>
                        <input type="submit" name="cadastrar" value="<?= $rotulo ?> "  />
                    </fieldset>
                </form>
                
                <?php
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
                ?>
            </article>
        </section>
        
        <footer id="rodape">
            <?php include('./Rodape.html'); ?> 
        </footer>
    </div>
</body>
</html>