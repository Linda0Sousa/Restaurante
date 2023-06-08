<?php  

require "../includes/header.php";


?>
<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/dist/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container my-5">
    <div class="row align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-4 fw-bold lh-1">Faça Parte</h1>
        <p class="lead">Desbloqueie o potencial do seu negócio e satisfaça o seu paladar com a nossa aplicação. Descubra um mundo de possibilidades gastronômicas e registre-se hoje mesmo!</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold"><a class="text-white" href="formularioCliente.php">Sou cliente</a></button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4"><a href="formularioRestaurante.php">Sou Restaurante</a></button>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="../pratos/img/herofoto.jpg" alt="prato" width="400">
      </div>
    </div>
  </div>

  <?php require "../includes/footer.php"; ?>