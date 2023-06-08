<?php

session_start();

include_once "../includes/header.php";

require_once "../../classes/MyConnect.php";
require_once "../../classes/Restaurante.php";
require_once "../../classes/Tipo.php";

$conexao = MyConnect::getInstance();

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

    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="get" action="pratos.php">
    <label for="country" class="form-label">Tipo de Prato:</label>
              <select name="tipo" class="form-select" id="country" required="">
                <option value="">Opções:</option>
                <option>entradas</option>
                <option>sopas</option>
                <option>peixe</option>
                <option>carne</option>
                <option>vegetariano</option>
                <option>sobremesas</option>
                <option>bebidas</option>
              </select>
             <button>Filtrar</button> 
  </form>
    <?php 
    
    //procura os restaurantes pela situação (activo ou bloqueado)
    $restaurantes = Restaurante::search([
      ['coluna' => 'situacao_id', 'operador' => '=', 'valor' => 1 ]
    ]);

    foreach ($restaurantes as $restaurante){
      if(!isset($_GET['tipo'])){
      $pratos = $conexao->query('select * from ementa where ementa.restaurante_id = ' . $restaurante->getId());
      }
      else {

        $tipos = Tipo::search([
          ['coluna' => 'tipo', 'operador' => '=', 'valor' => $_GET['tipo']]
        ]);

        $tipo = $tipos[0];

        $pratos = $conexao->query('select * from ementa where ementa.restaurante_id = ' . $restaurante->getId() . " and ementa.tipo_id = " . $tipo->getId());
      }
    ?>
      <h4 style= "margin-top: 3rem"><?php echo $restaurante->getNome() ?></h4>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"> 
        <?php while ($prato = $pratos->fetch_assoc()) { 
          if($prato['estado_id'] == 1){?>
          <div class="col">
            <div class="card shadow-sm">
              <a href="detalhesPrato.php?id=<?php echo $prato['id']?>">
              <img class="bd-placeholder-img card-img-top" width="100%" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"
              src="<?php echo $prato["imagem"]; ?>" alt="Imagem de um prato" style="object-fit: cover; height: 300px;"></a>
              <div class="card-body">
                <p class="card-text"><?php echo $prato["nome"] . " : " . $prato["descricao"]; ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                   <!-- Botão para o cliente adicionar os pratos --> 
                  <?php if($_SESSION["perfil"] == 2){?>
                  <a href="../../validacoes/adicionarCarrinho.php?acao=adicionar&id=<?php echo $prato['id']; ?>" class="btn btn-sm btn-outline-secondary">Adicionar ao carrinho</a>
                  
                  <?php } 
                  elseif($_SESSION["perfil"] == 1){?>
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
      </div> <?php } ?>
    </div>
  </div>
</main>


<?php

include_once "../includes/footer.php"

?>