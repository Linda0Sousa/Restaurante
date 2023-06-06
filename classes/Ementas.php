<?php

require_once "Model.php";


require 'C:\xampp\htdocs\restauranteA\vendor\autoload.php';

class Ementas extends Model{
    protected int $id;
    protected ?string $nome;
    protected ?int $restaurante_id;
    protected ?string $descricao;
    protected ?float $preco;
    protected ?string $estado_id;
    protected ?int $tipo_id;
    protected ?string $imagem;

    public function __construct(?string $descricao ="", ?string $nome ="", ?float $preco = null, string $estado ="", string $tipo_id  = null,
    string $imagem ="", ?int $restaurante_id = null)
    {
        parent::__construct('ementa', 'id');
        $this->id = 1;
        $this->descricao = $descricao;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estado_id= $estado;
        $this->tipo_id = $tipo_id;
        $this->imagem = $imagem;
        $this->restaurante_id = $restaurante_id;
    }

    /**
     * Get the value of imagem
     */
    public function getImagem(): string
    {
        return $this->imagem;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of preco
     */
    public function getPreco(): ?float
    {
        return $this->preco;
    }

    /**
     * Get the value of restaurante_id
     */
    public function getRestauranteId(): ?int
    {
        return $this->restaurante_id;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Get the value of descricao
     */
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }
    /**
     * Get the value of estado_id
     */
    public function getEstadoId(): ?string
    {
        return $this->estado_id;
    }

}