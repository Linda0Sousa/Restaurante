<?php

class Situacao extends Model
{
    protected int $id;
    protected string $tipo;

    public function __construct($tipo)
    {
        parent::__construct('situacao', 'id');
        $this->tipo = $tipo;
    }
}