<?php

function Conectar_Banco() {
    $conn = mysqli_connect("localhost", "root", "159753", "Agenda");
    /* $select = mysql_select_db("Agenda") or die("Sem acesso ao DB, Entre em 
      contato com o Administrador, fagner.couto@tga.ifmt.edu");
     */


    if (!$conn) {
        die("Erro ao conectar no banco de dados: " . mysqli_connect_error());
        exit();
    }
    /*
      $sql = "SELECT * FROM User ";
      $result = mysqli_query($conn, $sql);


      if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_row($result)) {
      printf("Codigo: %s <br/> Login: %s <br/> Senha: %s <br/><br/>", $row[0], $row[1], $row[2]);
      }
      } else {
      echo "ola";
      } */

    /*
      for ($index = 0; $index < count($aux_query); $index++) {
      echo "<br/> " . $aux_query[$index] ;
      }
     *  */

    return $conn;
}
