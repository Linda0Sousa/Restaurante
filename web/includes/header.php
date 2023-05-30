<?php 

session_start();

?>


<html>
<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/dist/css/bootstrap.css">
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="../icons/fast-delivery.png" class="bi me-2" width="52" height="52" role="img" aria-label="Bootstrap">
        </a>

        <?php if($_SESSION["perfil"] == 2) { ?>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../paginasWeb/pratos.php" class="nav-link px-2 text-white">Ementas</a></li>
          <li><a href="../paginasWeb/verCarrinho.php" class="nav-link px-2 text-white">Ver o carrinho</a></li>
        </ul>

        <?php } elseif($_SESSION["perfil"] == 1) { ?>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../paginasWeb/pratos.php" class="nav-link px-2 text-white">Ementas</a></li>
          <li><a href="../paginasWeb/formularioRestaurante.php" class="nav-link px-2 text-white">Novo restaurante</a></li>
          <li><a href="../paginasWeb/formularioAdmnistrador.php" class="nav-link px-2 text-white">Novo admnistrador</a></li>
          <li><a href="../paginasWeb/listaEmentas.php" class="nav-link px-2 text-white">Todos os Pratos</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Utilizadores</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Encomendas</a></li>
        </ul>
        
        <?php } elseif($_SESSION["perfil"] == 3) { ?>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="../paginasWeb/adicionarPrato.php" class="nav-link px-2 text-white">Novo Prato</a></li>
          <li><a href="../paginasWeb/verEncomendas.php" class="nav-link px-2 text-white">Encomendas</a></li>
        </ul>

        <?php } else{  ?>

          <p class="nav-link px-2 text-white">Bem-vindo!</p>

        <?php }; ?>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="post" action="../../validacoes/validaLogin">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2"><a style="color: white; text-decoration: none;" href="login.php">Login</a></button>
          <button type="button" class="btn btn-warning"><a style="color: black; text-decoration: none;" href="formularioCliente.php">Sign-up</a></button>
        </div>
      </div>
    </div>
  </header>

  <script src="https://getbootstrap.com/docs/5.3/js/index.umd.js"></script>