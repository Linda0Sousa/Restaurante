<?php

class Admnistrador extends Entidade
{
    protected int $id;
    protected string $nome;
    protected string $email;
    protected string $palavraPasse;
    protected string $estado;
    protected Morada $morada;
}