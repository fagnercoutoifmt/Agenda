<?php

class Produto {

    private $idUser;
    private $login;
    private $senha;
    
    function getIdUser(){
        return $idUser;
    }
    
    function getLogin() {
        return $this->login;
    }

    function getSenha() {
        return $this->senha;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }


}
