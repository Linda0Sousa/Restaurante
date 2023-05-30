<?php

require_once "Model.php";
use Carbon\Carbon;

class Encomenda extends Model
{
    protected int $id;
    protected ?Carbon $dataSubmissao;
    protected ?float $montante;
    protected ?int $cliente_id = null;
    protected ?int $restaurante_id = null;
    protected ?int $estado_id = null;
    protected ?int $ementa_id = null;

    public function __construct(?Carbon $dataSubmissao, float $montante = null, ?int $cliente_id = null, ?int $restaurante_id = null,
    ?int $estado_id = null, ?int $ementa_id)
    {
      parent::__construct('encomenda', 'id', ["dataSubmissao"]);
      $this->dataSubmissao = $dataSubmissao;
      $this->montante = $montante;
      $this->cliente_id = $cliente_id;
      $this->restaurante_id = $restaurante_id;
      $this->estado_id = $estado_id;
      $this->ementa_id = $ementa_id;  
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }
}