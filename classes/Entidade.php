<?php

require_once "Utilizador.php";
require_once "Morada.php";

abstract class Entidade extends Model{
    protected ?int $nif;
    protected ?int $morada_id;
    protected ?string $tlm;

    public function __construct(?int $nif = null, ?int $morada_id = null, ?string $tlm = '', string $tablename, string $id)
    {
        parent::__construct($tablename, $id);

        $this->nif = self::validaNif($nif);
        
        $this->morada_id = $morada_id;
        $this->tlm = self::validaTlm($tlm);
    }

    

    public function validaNif($nif, $ignoreFirst = true)
    {

     $nif=trim($nif);

        if (!is_numeric($nif) || strlen($nif)!=9) {
            return null;
        } else {
            $nifSplit=str_split($nif);
            if (
                in_array($nifSplit[0], array(1, 2, 3, 5, 6, 8, 9))
                ||
                $ignoreFirst
            ) {
                
                $checkDigit=0;
                for($i=0; $i<8; $i++) {
                    $checkDigit+=$nifSplit[$i]*(10-$i-1);
                }
                $checkDigit=11-($checkDigit % 11);
                //Se der 10 então o dígito de controlo tem de ser 0
                if($checkDigit>=10) $checkDigit=0;
                //Comparamos com o último dígito
                if ($checkDigit==$nifSplit[8]) {
                    return $nif;
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }
    }

    public function validaTlm($tlm)
    {
        if(strlen($tlm)==9){
            return $tlm;
        } else {
            return null;
        }
    }

    /**
     * Get the value of nif
     */
    public function getNif(): ?int
    {
        return $this->nif;
    }

    /**
     * Get the value of tlm
     */
    public function getTlm(): ?string
    {
        return $this->tlm;
    }

    /**
     * Get the value of morada_id
     */
    public function getMoradaId(): ?int
    {
        return $this->morada_id;
    }
}