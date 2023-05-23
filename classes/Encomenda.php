<?php

require_once "Model.php";
use Carbon\Carbon;

class Encomenda extends Model
{
    protected int $id;
    protected Carbon $dataSubmissao;
    protected float $montante;
    protected ?int $cliente_id = null;
    protected ?int $restaurante_id = null;
    protected ?int $situacao_id = null;

    public function __construct(Carbon $dataSubmissao, float $montante, ?int $cliente_id, ?int $restaurante_id,
    ?int $situacao_id)
    {
      $this->dataSubmissao = $dataSubmissao;
      $this->montante = $montante;
      $this->cliente_id = $cliente_id;
      $this->restaurante_id = $restaurante_id;
      $this->situacao_id = $situacao_id;  
    }
}