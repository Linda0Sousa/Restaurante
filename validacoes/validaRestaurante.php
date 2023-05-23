<?php

use Carbon\Carbon;

require_once "../classes/Restaurante.php";




$morada = new Morada($_POST['pais'], $_POST['localidade'], $_POST['codigoPostal'], $_POST['porta'], $_POST['rua']);
$morada->save();


$horaAbertura = carbon::parse($_POST['Habertura']);
$horaFecho = Carbon::parse($_POST['Horafecho']);


$restaurante = new Restaurante($_POST['nome'], $_POST['nif'], $morada->getId(), $_POST['tlm'], 3, $_POST['email'], $_POST['designacao'], $horaAbertura,
$horaFecho, 1, $_POST['tlmResponsavel'], 'segunda', $_POST['paymentMethod'], "webpage", "nomeresponsavel", 1);



$restaurante->save();