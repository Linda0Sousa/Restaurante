<?php

include_once "Morada.php";

class Utilizador {
    protected int $id;
    protected string $nome;
    protected string $email;
    protected string $passe;
    protected string $estado;
    protected Perfil $perfil;
    protected Morada $morada;

    public function __construct(string $nome, string $email,string $passe, Morada $morada, Perfil $perfil)
    {
        $this->nome =$nome;
        $this->email = $email;
        $this->passe = $passe;
        $this->morada = $morada;
        $this->estado = self::estado($perfil);
    }

    //depois pode se verificar a operadora
    public function validaTlm($tlm)
    {
        //nove digitos
        if(strlen($tlm)!==9){
            return false;
        }

        return $tlm;
    }

    public function estado(Perfil $perfil)
    {
        //validar o estado no memento da criação de uma conta
        if($perfil->getId() == "cliente"){
            return "ativo";
        } elseif ($perfil->getId() == "restaurante"){
            return "pendente";
        } else {
            return "ativo";
        }
    }

}