<?php

include_once "../includes/header.php";

require_once "../../classes/MyConnect.php";

$conexao = MyConnect::getInstance();

$pratos = $conexao->query('select * from ementa');
?>

<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css">
<script href="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>

<main>

  <section class="py-5 text-center" style="background-image: url('../icons/hamburger.jpg'); background-repeat: no-repeat;
  background-size: cover; background-position: center;">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Order & Go!</h1>
        <p class="lead text-body-secondary">Qualidade e rapidez ao seu dispor</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php while ($prato = $pratos->fetch_assoc()) { 
          if($prato['estado_id'] != 2){?>
          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"
              src="<?php echo $prato["imagem"]; ?>" alt="Imagem de um prato" style="object-fit: cover; height: 300px;">
              <div class="card-body">
                <p class="card-text"><?php echo $prato["nome"] . " : " . $prato["descricao"]; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                  <?php if($_SESSION["perfil"] == 2){?>
                  <a href="../../validacoes/adicionarCarrinho.php?id=<?php echo $prato['id']; ?>" class="btn btn-sm btn-outline-secondary">Adicionar ao carrinho</a>
                  <?php } 
                  elseif($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 3){?>
                  <a href=<?php echo "../../validacoes/alterarEstado.php?id=".$prato['id']?> class="btn btn-sm btn-outline-secondary" href="">Alterar Estado</a>
                  <?php }
                  else{?>
                  <a href="../web/paginasWeb/login.php" class="btn btn-sm btn-outline-secondary" href="">Faça Login</a>
                  <?php } ?>
                  </div>
                  <small class="text-body-secondary"><?php echo "Preço com IVA: " . $prato["preco"] . "€" ?></small>
                </div>
              </div>
            </div>
          </div>
        <?php } }?>
      </div>
    </div>
  </div>
</main>


<?php

include_once "../includes/footer.php"

?>