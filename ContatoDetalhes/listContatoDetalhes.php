<html lang="pt-br">
    <body>
        <fieldset>
            <legend>Detalhes:</legend>
            <form method = "POST" name = "formlogin" >
                <label>Contato :</label>
                <input type = "text" hidden = "true" name = "agContatoDetalhesId"/>
                <input type = "text" style = "width: 293px;" name = "Contato" />

                <label> Tipo Contato:</label>
                <select name = "agTipoContatoId2" id = "cEst">
                    <?php
                    include("../DataBase/config.php");
                    $sql = "SELECT * FROM `agContatosTipo`";
                    $result = mysqli_query($mysqli, $sql);

                    while ($aux_query = mysqli_fetch_row($result)) {
                        if ($aux_query[0] == $agTipoContatoId) {
                            echo "<option value=\"$aux_query[0]\" selected=\"selected\">$aux_query[1]</option>";
                        } else {
                            echo "<option value=\"$aux_query[0]\">$aux_query[1]</option>";
                        }
                    }
                    ?>                  

                </select>      

                <input type="submit" name="InserirDetalhes" value="Inserir"/>                               
            </form>
    </body>
</html>