<?php

class Perfil {
    protected int $id;
    protected string $designacao;

    public function __construct($designacao)
    {
        $this->designacao = $designacao;
    }

    //Id dos perfis (só existem 4 que dependem da designacao)
    

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }
}