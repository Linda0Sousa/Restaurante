<?php

//Muda para o teu local, coloca no terminal: composer require nesbot/carbon
require 'C:\xampp\htdocs\restauranteA\vendor\autoload.php';

use Carbon\Carbon;

include_once "Morada.php";
include_once "Utilizador.php";

class Restaurante extends Entidade{
    protected int $id;
    protected string $designacao;
    protected Carbon $horaAbertura;
    protected Carbon $horaFecho;
    //Array de carbons
    protected array $horasTw;
    protected array $feriados;
    protected array $tipoDePagamento;
    protected string $telemovel;
    protected string $telefone;
    protected string $webpage;
    protected string $nomeResponsavel;
    protected string $tlmResponsavel;
    protected string $situcao;
    protected Morada $morada;

    public function __construct()
    {
        
    }
}