<?php

require_once "Model.php";

class MetodosPagamentos extends Model
{
    protected int $id;
    protected ?int $restaurante_id = NULL;
    protected string $metodo;

    public function __construct(int $restaurante_id, string $metodo)
    {
        $this->restaurante_id = $restaurante_id;
        $this->metodo = $metodo;
    }
}