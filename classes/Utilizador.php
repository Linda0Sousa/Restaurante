<?php

require_once "MyConnect.php";
require_once "Model.php";
class Utilizador extends Model
{
    protected ?string $email;
    protected string $password;
    protected string $nome;
    protected ?int $id;
    protected ?int $perfil_id;
    protected ?int $situacao_id;

    public function __construct(string $email = '', string $password = '', string $nome = '', ?int $perfil_id = null, 
    ?int $situacao_id = null)
    {
        parent::__construct('utilizador', 'id');

        $this->email = self::validaEmail($email);
        $this->password = $password;
        $this->nome = $nome;
        $this->id = null;
        $this->perfil_id = $perfil_id;
        $this->situacao_id = $situacao_id;
    }

    
    public function validaEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return $email;
        } else {
            return null;
        }
    }


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
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
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of perfil_id
     */
    public function getPerfilId(): ?int
    {
        return $this->perfil_id;
    }

    /**
     * Get the value of situacao_id
     */
    public function getSituacaoId(): ?int
    {
        return $this->situacao_id;
    }
}