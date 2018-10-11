<!DOCTYPE html>

<?php
session_start();
include("../DataBase/config.php");

if (!empty($_GET['id'])) {
    $idAgenda = $_GET['id'];
    $rotuloContato = "Atualizar";
    $sql = "SELECT * FROM `agContatos` where `agContatos`.`agContatoId` =\"$idAgenda\"";
    $result = mysqli_query($mysqli, $sql);

    while ($aux_query = mysqli_fetch_row($result)) {
        $agContatoId = $aux_query[0];
        $NomeContato = $aux_query[1];
        $estCivil = $aux_query[2];
        $dataNasc = $aux_query[3];
        $lembrarNiver = $aux_query[4];
    }
} else {
    if (empty($_POST['id'])) {
        $rotuloContato = "Salvar";
    } else {
        $rotuloContato = "Atualizar";
    }
}
?>

<?php
if (isset($_POST['voltar'])) {
    header("Location: http://www.ficifmt.online/Contato/listContato.php");
}
?>

<?php
if (isset($_POST['updateContato']) || isset($_POST['addContatoDetalhes'])) {

    $NomeContato = mysqli_real_escape_string($mysqli, $_POST['NomeContato']);
    $estCivil = mysqli_real_escape_string($mysqli, $_POST['estCivil']);
    $dataNasc = mysqli_real_escape_string($mysqli, $_POST['dataNasc']);

    if (isset($_POST['lembrarNiver'])) {
        $lembrarNiver = 1;
    } else {
        $lembrarNiver = 0;
    }

    if (!empty($NomeContato) & !empty($estCivil) & !empty($dataNasc)) {
        $pegue = $rotuloContato;
        echo "Rlutulo: $pegue";
        if ($rotuloContato == "Atualizar") {
            $id = mysqli_real_escape_string($mysqli, $_POST['id']);

            $sql = "UPDATE `agContatos` "
                    . "SET `NomeContato`=\"$NomeContato\","
                    . "`estCivil`=\"$estCivil\","
                    . "`dataNasc`=\"$dataNasc\","
                    . "`lembrarNiver`=$lembrarNiver "
                    . " WHERE `agContatoId`= $id";
            $result = mysqli_query($mysqli, $sql);

            if ($result == false) {
                echo "Error updateContato Atualizar";
                echo "<br/>" . mysqli_error($mysqli);
            } else {
                if (!isset($_POST['addContatoDetalhes'])) {
                    header("Location: http://www.ficifmt.online/Contato/listContato.php");
                } else {
                    header("Location: http://www.ficifmt.online/ContatoDetalhes/addContatoDetalhes.php?id=" . $id);
                }
            }
        } else {
            $sql = "INSERT INTO `agContatos`(`NomeContato`, `estCivil`, `dataNasc`, `lembrarNiver`)"
                    . " VALUES (\"$NomeContato\",\"$estCivil\",\"$dataNasc\",\"$lembrarNiver\")";
            $result = mysqli_query($mysqli, $sql);
            echo "$sql";

            if ($result == false) {
                echo "Error INSERT agContatos";
                echo "<br/>" . mysqli_error($mysqli);
            } else {
                if (!isset($_POST['addContatoDetalhes'])) {
                    header("Location: http://www.ficifmt.online/Contato/listContato.php");
                } else {
                    $id = mysqli_insert_id($link);
                    header("Location: http://www.ficifmt.online/ContatoDetalhes/addContatoDetalhes.php?id=" . $id);
                }
            }
        }
    } else {
        echo"<script language='javascript' type='text/javascript'>alert('Primeiramente preencha todas as informações!');</script>";
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
                    <fieldset id="fie">
                        <legend>Cadastro de Contato</legend> <p/>
                        <form method="POST" id="formlogin" name="formlogin" action="editContato.php">
                            <p> <label>Nome :</label>
                                <input type="text" style="width: 760px;" name="NomeContato" value="<?php echo "$NomeContato" ?>" id="login"  />
                            <p/>

                            <p> <label for="cData">Data de Nascimento:</label>
                                <input type="date" name="dataNasc" value="<?php echo "$dataNasc" ?>" id="cData" />
                            </p>

                            <p> <label> Estado Civil:</label>
                                <select name="estCivil" value="<?php echo "$estCivil" ?>" id="cEst">
                                    <option value="Solteiro"  <?= $estCivil == 'Solteiro' ? ' selected="selected"' : ''; ?> >Solteiro</option>
                                    <option value="Casado"    <?= $estCivil == 'Casado' ? ' selected="selected"' : ''; ?> >Casado</option>
                                    <option value="Separado"  <?= $estCivil == 'Separado' ? ' selected="selected"' : ''; ?> >Separado</option>
                                    <option value="Divorciado"<?= $estCivil == 'Divorciado' ? ' selected="selected"' : ''; ?> >Divorciado</option>
                                    <option value="Viúvo"     <?= $estCivil == 'Viúvo' ? ' selected="selected"' : ''; ?>>Viúvo</option>
                                </select>
                            </p>

                            <p> <input type="checkbox" name="lembrarNiver" value="<?= $lembrarNiver ?>" id="cPed" <?php
                if ($lembrarNiver == 1) {
                    echo "checked";
                } else {
                    echo "unchecked";
                }
                ?>/>
                                <label for="cPed">Lembrar do Aniversário?</label>
                            </p>
                            <input type="hidden" name="id" value=<?php echo $idAgenda; ?>>

                            <p> <input type="submit" name="addContatoDetalhes" value="Adicionar Números"  /></p>

                            <p> 
                                <input type="submit" name="updateContato" value="<?= $rotuloContato ?>"/>
                                <input type="submit" name="voltar" value="Voltar"/>
                            </p>

                        </form> 
                    </fieldset>
                </article>
            </section>

            <footer id="rodape">
                <?php include('../Rodape.html'); ?> 
            </footer>
        </div>
    </body>
</html>