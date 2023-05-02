<?php

include_once 'C:\xampp\htdocs\PW2\restaurante\classes\Utilizador.php';

$utilizador = new Utilizador("Linda", "email", "passe", 261596365, "tlm", "estado", "morada", "cliente");

var_dump($utilizador);

echo "<br>";
echo "<br>";

var_dump($utilizador->idUtilizador());