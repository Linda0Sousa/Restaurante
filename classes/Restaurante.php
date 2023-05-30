<?php

//Muda para o teu local, coloca no terminal: composer require nesbot/carbon
require 'C:\xampp\htdocs\restauranteA\vendor\autoload.php';
use Carbon\Carbon;

include_once "Morada.php";
include_once "Utilizador.php";
include_once "Entidade.php";

class Restaurante extends Entidade{
    protected ?int $id;
    protected ?string $nome;
    protected ?int $nif;
    protected ?string $designacao;
    protected Carbon $horaAbertura;
    protected Carbon $horaFecho;
    protected ?string $tlm;
    protected ?string $tlf;
    protected ?string $webpage;
    protected ?string $nomeResponsavel;
    protected ?string $tlmResponsavel;
    protected ?int $morada_id = null;
    protected ?string $email;
    protected ?int $situacao_id = null;
    protected ?int $utilizador_id = null;
    protected ?string $password;
    protected ?int $segunda;
    protected ?int $terca;
    protected ?int $quarta;
    protected ?int $quinta;
    protected ?int $sexta;
    protected ?int $sabado;
    protected ?int $domingo;
    protected ?int $MBway;
    protected ?int $visa;
    protected ?int $multibanco;
    protected ?int $numerario;
    protected ?int $cheque;

    public function __construct(?string $nome = "", ?int $nif = null, ?string $designacao = "", 
    Carbon $horaAbertura, Carbon $horaFecho, ?string $tlm = null,
    ?string $telefone = "", ?string $webpage = "", ?string $nomeResponsavel = "", ?string $tlmResponsavel = "", 
    ?int $morada_id = null, string $email = "", ?int $situacao_id = null, 
    ?int $utilizador_id = null, string $password = "", int $segunda  = 0, int $terca = 0, int $quarta = 0, int $quinta = 0, int $sexta = 0, 
    int $sabado = 0, int $domingo = 0, int $MBway = 0, int $visa = 0, $multibanco = 0, $numerario = 0, $cheque = 0)
    {
        parent::__construct($nif, $morada_id, $tlm, 'restaurante', 'id');

        $this->nome = $nome;
        $this->designacao = $designacao;
        $this->horaAbertura = $horaAbertura;
        $this->horaFecho = $horaFecho;
        $this->tlf = $telefone;
        $this->email = $email;
        $this->utilizador_id = $utilizador_id;
        $this->password = $password;
        $this->tlmResponsavel = $tlmResponsavel;
        $this->webpage = $webpage;
        $this->nomeResponsavel = $nomeResponsavel;
        $this->situacao_id = $situacao_id;
        $this->segunda = $segunda;
        $this->terca = $terca;
        $this->quarta = $quarta;
        $this->quinta = $quinta;
        $this->sexta = $sexta;
        $this->sabado = $sabado;
        $this->domingo = $domingo;
        $this->MBway = $MBway;
        $this->visa = $visa;
        $this->multibanco = $multibanco;
        $this->numerario = $numerario;
        $this->cheque = $cheque;
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
     * Get the value of situacao_id
     */
    public function getEstadoId(): ?int
    {
        return $this->situacao_id;
    }

    /**
     * Set the value of situacao_id
     */
    public function setEstadoId(?int $situacao_id): self
    {
        $this->situacao_id = $situacao_id;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}