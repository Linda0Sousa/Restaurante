<?php

require_once "Morada.php";

abstract class utilizador {

    protected const fRegistros = "registro.txt";

    protected int $id;
    protected string $nome; 
    protected string $email;
    protected string $passe;
    protected int $nif;
    protected string $tlm;
    protected string $estado;
    protected Morada $morada;

    public function __construct($nome, $email, $passe, $nif, $tlm, $estado, $morada)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->passe = $passe;
        $this->nif = $nif;
        $this->tlm = $tlm;
        $this->estado = $estado;
        $this->morada = $morada;
    }


}