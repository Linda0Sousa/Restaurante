<?php 

class Morada {
    protected int $id;
    protected string $pais;
    protected string $localidade;
    protected string $codigoPostal;
    protected string $numPorta;
    protected string $rua;

    public function __construct($pais, $localidade, $codigoPostal, $numPorta, $rua)
    {
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
            if(strlen($array[0])==4 || strlen($array[1]==3)){
                return $codigoPostal;
            } else {
                return null;
            }
        } else{
            return null;
        }
    }
}