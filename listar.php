<?php

require_once 'MyConnect.php';
$ligacao = MyConnect::getInstance();

$resultado = $ligacao->query("select*from utilizadores");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de utilizadores</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h2 class="alert alert-primary">Utilizadores (<?php echo $resultado->num_rows; ?>)</h2>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while($row = $resultado->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?php $row['nome'];?></td>
                                <td><?php $row['email'];?></td>
                                <td><?php $row['perfil_id'];?></td>
                                <td></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>