<?php 

session_start();

?>


<html>
<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/dist/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="../icons/fast-delivery.png" class="bi me-2" width="52" height="52" role="img" aria-label="Bootstrap">
        </a>

        <?php if(isset($_SESSION["perfil"]) && $_SESSION["perfil"] == 2) { ?>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../paginasWeb/pratos.php" class="nav-link px-2 text-white">Ementas</a></li>
          <li><a href="../paginasWeb/verCarrinho.php" class="nav-link px-2 text-white">Ver o carrinho</a></li>
          <li><a href="../paginasWeb/encomendados.php" class="nav-link px-2 text-white">Gerir Encomendas</a></li>
        </ul>

        <?php } elseif(isset($_SESSION["perfil"]) && $_SESSION["perfil"] == 1) { ?>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../paginasWeb/pratos.php" class="nav-link px-2 text-white">Ementas</a></li>
          <li><a href="../paginasWeb/restaurantesEstado.php" class="nav-link px-2 text-white">Ver Restaurantes</a></li>
          <li><a href="../paginasWeb/formularioAdmnistrador.php" class="nav-link px-2 text-white">Novo admnistrador</a></li>
          <li><a href="../paginasWeb/listaEmentas.php" class="nav-link px-2 text-white">Todos os Pratos</a></li>
          <li><a href="../paginasWeb/listaClientes.php" class="nav-link px-2 text-white">Clientes</a></li>
          <li><a href="../paginasWeb/encomendasAdmn.php" class="nav-link px-2 text-white">Encomendas</a></li>
        </ul>
        
        <?php } elseif(isset($_SESSION["perfil"]) && $_SESSION["perfil"] == 3) { ?>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../paginasWeb/adicionarPrato.php" class="nav-link px-2 text-white">Novo Prato</a></li>
          <li><a href="../paginasWeb/verEncomendas.php" class="nav-link px-2 text-white">Encomendas</a></li>
          <li><a href="../paginasWeb/listaEmentas.php" class="nav-link px-2 text-white">Alterar o Prato</a></li>
        </ul>

        <?php } else{  ?>

          <p class="nav-link px-2 text-white">Bem-vindo!</p>

        <?php }; ?>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2"><a style="color: white; text-decoration: none;" href="login.php">Login</a></button>
          <button type="button" class="btn btn-warning"><a style="color: black; text-decoration: none;" href="../paginasWeb/signUp.php">Sign-up</a></button>
        </div>
      </div>
    </div>
  </header>

  <script src="https://getbootstrap.com/docs/5.3/js/index.umd.js"></script>