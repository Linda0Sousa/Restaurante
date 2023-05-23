<?php

require_once 'Model.php';

class Perfil extends Model
{
    protected string $nome;
    protected ?int $id;

    public function __construct(string $nome)
    {
        parent::__construct('perfil', 'id');

        $this->nome = $nome;
        $this->id = null;
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId()
    {
        switch($this->nome)
        {
            case 'cliente':
                $this->id = 1;
                break;
            case 'admnistrador':
                $this->id = 2;
                break;
            case 'restaurante':
                $this->id = 3;
                break;
        }
    }


}