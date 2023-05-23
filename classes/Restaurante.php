<?php

//Muda para o teu local, coloca no terminal: composer require nesbot/carbon
require 'C:\xampp\htdocs\restauranteA\vendor\autoload.php';
use Carbon\Carbon;

include_once "Morada.php";
include_once "Utilizador.php";
include_once "Entidade.php";

class Restaurante extends Entidade{
    protected ?int $id;
    protected string $nome;
    protected int $nif;
    protected string $designacao;
    protected Carbon $horaAbertura;
    protected Carbon $horaFecho;
    protected ?int $metodoPagamento = null;
    protected string $tlm;
    protected string $telefone;
    protected string $webpage;
    protected string $nomeResponsavel;
    protected string $tlmResponsavel;
    protected ?int $morada_id = null;
    protected string $email;
    protected ?int $estado_id = null;
    protected ?int $utilizador_id = null;
    protected string $password;
    protected bool $segunda = false;
    protected bool $terca = false;
    protected bool $quarta = false;
    protected bool $quinta = false;
    protected bool $sexta = false;
    protected bool $sabado = false;
    protected bool $domingo = false;

    public function __construct(string $nome, int $nif, string $designacao, Carbon $horaAbertura, Carbon $horaFecho, ?int $metodoPagamento, string $tlm,
    string $telefone, string $webpage, string $nomeResponsavel, string $tlmResponsavel, ?int $morada_id, string $email, ?int $estado_id, ?int $utilizador_id, 
    string $password, bool $segunda, bool $terca, bool $quarta, bool $quinta, bool $sexta, bool $sabado, bool $domingo)
    {
        parent::__construct($nif, $morada_id, $tlm, 'restaurante', 'id');

        $this->nome = $nome;
        $this->designacao = $designacao;
        $this->horaAbertura = $horaAbertura;
        $this->horaFecho = $horaFecho;
        $this->metodoPagamento = $metodoPagamento;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->utilizador_id = $utilizador_id;
        $this->password = $password;
        $this->tlmResponsavel = $tlmResponsavel;
        $this->webpage = $webpage;
        $this->nomeResponsavel = $nomeResponsavel;
        $this->estado_id = $estado_id;
        $this->segunda = $segunda;
        $this->terca = $terca;
        $this->quarta = $quarta;
        $this->quinta = $quinta;
        $this->sexta = $sexta;
        $this->domingo = $domingo;
    }


    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of estado_id
     */
    public function getEstadoId(): ?int
    {
        return $this->estado_id;
    }

    /**
     * Set the value of estado_id
     */
    public function setEstadoId(?int $estado_id): self
    {
        $this->estado_id = $estado_id;

        return $this;
    }
}