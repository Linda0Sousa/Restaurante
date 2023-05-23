<?php 

require_once "Model.php";
use Carbon\Carbon;

class Feriados extends Model
{
    protected int $id;
    protected int $restaurante_id;
    protected Carbon $data;

    public function __construct(int $restaurante_id, int $data)
    {
        parent::__construct('feriados', 'id');
        $this->restaurante_id = $restaurante_id;
        $this->data = $data;
    } 
}