<?php

require_once "../../classes/MyConnect.php";
require_once "../../classes/Model.php";
require_once "../../classes/Ementas.php";

include "../includes/header.php";

$pratosPendentes = Ementas::search([
    ['coluna' => 'estado_id', 'operador' => '=', 'valor' => 2]
]);

?>
<div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach($pratosPendentes as $prato){   
          if($prato->getEstadoId() == 2){?>
          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"
              src="<?php echo $prato->getImagem(); ?>" alt="Imagem de um prato" style="object-fit: cover; height: 300px;">
              <div class="card-body">
                <p class="card-text"><?php echo $prato->getNome() . " : " . $prato->getDescricao(); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                  <a href="../../validacoes/pratoEstado.php?estado=1&id=<?php echo $prato->getId();?>" class="btn btn-sm btn-outline-secondary" href="">Confirmar</a>
                  <a href="../../validacoes/pratoEstado.php?&id=<?php echo $prato->getId();?>" class="btn btn-sm btn-outline-secondary" href="">Apagar</a>
                  </div>
                  <small class="text-body-secondary"><?php echo "Preço com IVA: " . $prato->getPreco() . "€"; } ?></small>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
    
</body>
</html>