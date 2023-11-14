<?php

class MyConnect
{
    private static $instance = null;
    private $connection = null;

    private function __construct()
    {
        $this->connection = new mysqli('127.0.0.1', 'root', 'LindaOSousa!', "restaurante", 3306);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new MyConnect();
        }

        return self::$instance->getConnection();
    }

    /**
     * Get the value of connection
     */
    public function getConnection()
    {
        return $this->connection;
    }
}