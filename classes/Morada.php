<?php 

require_once "Model.php";
class Morada extends Model{
    protected ?string $pais;
    protected ?string $localidade;
    protected ?string $codigoPostal;
    protected ?string $numPorta;
    protected ?string $rua;
    protected ?int $id;

    public function __construct($pais = "", $localidade = "", $codigoPostal = "", $numPorta = "", $rua = "")
    {
        parent::__construct('morada', 'id');
        
        $this->id = null;
        $this->pais = $pais;
        $this->localidade = $localidade;
        $this->codigoPostal = self::codigoPostal($codigoPostal);
        $this->numPorta = $numPorta;
        $this->rua = $rua;
    }

    public function codigoPostal($codigoPostal)
    {
        if(strlen($codigoPostal)==8)
        {
            $array = explode("-", $codigoPostal);
            if(strlen($array[0])==4 && strlen($array[1])==3){
                return $codigoPostal;
            } else {
                return null;
            }
        } else{
            return null;
        }
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pais
     */
    public function getPais(): string
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     */
    public function setPais(string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get the value of localidade
     */
    public function getLocalidade(): string
    {
        return $this->localidade;
    }

    /**
     * Set the value of localidade
     */
    public function setLocalidade(string $localidade): self
    {
        $this->localidade = $localidade;

        return $this;
    }

    /**
     * Get the value of codigoPostal
     */
    public function getCodigoPostal(): string
    {
        return $this->codigoPostal;
    }

    /**
     * Set the value of codigoPostal
     */
    public function setCodigoPostal(string $codigoPostal): self
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    /**
     * Get the value of numPorta
     */
    public function getNumPorta(): string
    {
        return $this->numPorta;
    }

    /**
     * Set the value of numPorta
     */
    public function setNumPorta(string $numPorta): self
    {
        $this->numPorta = $numPorta;

        return $this;
    }

    /**
     * Get the value of rua
     */
    public function getRua(): string
    {
        return $this->rua;
    }

    /**
     * Set the value of rua
     */
    public function setRua(string $rua): self
    {
        $this->rua = $rua;

        return $this;
    }
}