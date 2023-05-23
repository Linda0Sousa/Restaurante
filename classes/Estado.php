<?php

require_once "Model.php";

class Estado extends Model{
    protected ?int $id;
    protected string $designacao;

    public function __construct()
    {
        parent::__construct('estado', 'id');
        $this->id = null;
        $this->designacao =  'ativo';
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of designacao
     */
    public function getdesignacao(): string
    {
        return $this->designacao;
    }

    /**
     * Set the value of designacao
     */
    public function setdesignacao(string $designacao): self
    {
        $this->designacao = $designacao;

        return $this;
    }
}