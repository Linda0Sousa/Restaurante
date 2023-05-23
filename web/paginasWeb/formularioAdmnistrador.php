<?php

include_once "../includes/header.php";
?>

<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css">
<script href="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="col-md-6 col-lg-6" style="margin: 5rem auto 10rem; ">
        <h4 class="mb-3">Adicionar admnistrador</h4>
        <form class="needs-validation" novalidate="" method="post" action="../../validacoes/validaAdmnistrador.php">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" placeholder="" value="" required="" name="nome">
              <div class="invalid-feedback">
                Este campo é obrigatorio
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Password</label>
              <input type="text" class="form-control" id="zip" placeholder="" required="" name="password">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

          <hr class="my-4">

          <button class="w-20 btn btn-primary btn-lg" type="submit" style="margin-left: 43%">Continuar</button>
        </form>
</div>


      <?php
      include_once "../includes/footer.php"; ?>