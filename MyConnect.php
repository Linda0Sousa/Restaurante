<?php

class MyConnect
{
    private static $instance = null;
    private $connection = null;

    private function __construct()
    {
        // aqui dentro é que se faz a coisa demorada
        $this->connection = new mysqli('localhost', 'root', '4769Pro!', "auteticacao", 3306);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new MyConnect();
        } 
            return self::$instance->connection;
    }

    /**
     * Get the value of connection
     */ 
    public function getConnection()
    {
        return $this->connection;
    }
}