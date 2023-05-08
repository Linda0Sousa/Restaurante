<?php

abstract class Entidade extends Utilizador{
    protected int $id;
    protected int $nif;
    protected string $email;
    protected Morada $morada;
    protected string $tlm;
    protected string $estado;

    public function __construct(string $email, int $nif, Morada $morada, string $tlm)
    {
        $this->nif = self::validaNif($nif);
        $this->email = self::validaEmail($email);
        $this->morada = $morada;
        $this->tlm = self::validaTlm($tlm);
    }

    public function validaEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return $email;
        } else {
            return null;
        }
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
}