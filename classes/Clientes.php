<?php 

require_once "Entidade.php";
require_once "Morada.php";
require_once "Estado.php";

class Cliente extends Entidade{
    protected ?int $id;
    protected ?int $utilizador_id = null;
    protected ?int $morada_id = null;
    protected ?int $nif;
    protected ?string $tlm;

    public function __construct(?int $morada_id = null, ?int $nif = null, ?string $tlm ='', ?int $utilizador_id = null)
    {
        parent::__construct($nif, $morada_id, $tlm, 'cliente', 'id');
        $this->utilizador_id = $utilizador_id;
        $this->morada_id = $morada_id;
    }

    
}