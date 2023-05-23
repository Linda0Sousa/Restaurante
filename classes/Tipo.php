<?php

require_once "Model.php";

class Tipo extends Model
{
    protected int $id;
    protected string $tipo;

    public function __construct(string $tipo)
    {
        parent::__construct('tipo', 'id');
        $this->tipo = $tipo;
    }
}