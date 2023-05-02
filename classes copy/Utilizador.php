<?php

include_once "Morada.php";

/*abstract*/ class Utilizador {
    protected const utilizadores = 'C:\xampp\htdocs\PW2\restaurante\dados\utilizadores.txt';
    protected int $id;
    protected string $nome;
    protected string $email;
    protected string $passe;
    protected int $nif;
    protected string $tlm;
    protected string $estado;
    protected string $tipo; //os utilizadores não terão que preencher o tipo nos formularios, sendo atribuido automaticamente
    // protected object $morada;

    public function __construct($nome, $email, $passe, $nif, $tlm, $morada, $tipo)
    {
        $this->nome =$nome;
        $this->email = $email;
        $this->passe = $passe;
        $this->nif = self::validaNif($nif);
        $this->tlm = self::validaTlm($tlm);
        // $this->morada = $morada;
        $this->tlm = $tlm;
        $this->tipo = $tipo;
        $this->estado = self::estado($tipo);
    }

    public function validaNIF($nif) {

        $nif=trim($nif);
        //Verificamos se é numérico e tem comprimento 9
        if (!is_numeric($nif) || strlen($nif)!=9) {
            return false;
        } else {
            $nifSplit=str_split($nif);
            //O primeiro digíto tem de ser 1, 2, 3, 5, 6, 8 ou 9
            if (in_array($nifSplit[0], array(1, 2, 3, 5, 6, 8, 9))) {
                //Calculamos o dígito de controlo
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
                }
            }
            return false;
        }
    }

    //depois pode se verificar a operadora
    public function validaTlm($tlm)
    {
        //nove digitos
        if(strlen($tlm)!==9){
            return false;
        }

        return $tlm;
    }

    public function estado()
    {
        //validar o estado no memento da criação de uma conta
        if($this->tipo = "cliente"){
            return "ativo";
        } elseif($this->tipo = "restaurante"){
            return "pendente";
        } else {
            return "ativo";
        }
    }

    //O id vai depender de todos os utilizadores existentes, deve-se utilizar a base mysql
    public function idUtilizador()
    {
        $linhas = [];
        $utilizador = [];
    
        $ficheiro = fopen(self::utilizadores, 'r+');
        // while(!feof($ficheiro)){
            $utilizador = fgets($ficheiro);
        
        
        $linhas = $utilizador;

        fclose($ficheiro);
        return $linhas;
    }
}