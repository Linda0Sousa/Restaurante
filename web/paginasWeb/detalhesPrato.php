<?php

include "../includes/header.php";

require_once "../../classes/Ementas.php";

if (empty($_GET['id'])) {
    header('Location: index.php');
}

$prato = Ementas::find($_GET['id']);
if (empty($prato)) {
    header('Location: Pratos.php'); 
    exit;
}

?>

<div class="container" style="height: 100vh; padding: 2rem;">

<h2>Ficha de Técnica</h2>


<div class="row mb-5 justify-content-center">
    <div class="col-xs-12 col-md-8 col-lg-4">
        <img src="<?php echo $prato->getImagem();?>" alt="" class="img-fluid">
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table table-hover table-bordered table-striped">
            <tr>
                <th>Nome</th>
                <td><?php echo $prato->getNome(); ?></td>
            </tr>
            <tr>
                <th>Preço</th>
                <td><?php echo $prato->getPreco(); ?></td>
            </tr>
            <tr>
                <th>Descrição</th>
                <td><?php echo $prato->getDescricao(); ?></td>
            </tr>
        </table>
    </div>
</div>


</div>

<?php

include "../includes/footer.php";

?>