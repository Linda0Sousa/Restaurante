<?php

require_once "Model.php";


require 'C:\xampp\htdocs\restauranteA\vendor\autoload.php';

class Ementas extends Model{
    protected int $id;
    protected string $nome;
    protected ?int $restaurante_id = null;
    protected string $descricao;
    protected float $preco;
    protected string $estado;
    protected ?int $tipo_id = null;
    protected string $img;

    public function __construct(string $descricao, string $nome, float $preco, string $estado, string $tipo_id, string $img)
    {
        $this->id = 1;
        $this->descricao = $descricao;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estado= $estado;
        $this->tipo_id = $tipo_id;
        $this->img = $img;
    }

    // public static function verImagens($id)
    // {
        // return 

    //     $database = ('use restauranteTeste');
    //     $query=('select*ementas.img from ementas where ementas_id = ' .$id); 
        
    //     $conecao->$database;
    //     $conecao->$query;

    //    
    // }
    
}