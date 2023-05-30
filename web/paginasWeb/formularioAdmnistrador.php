<?php
session_start();
include_once "../includes/header.php";

if($_SESSION['perfil'] != 1){
  ?>
  <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="refresh" content="2;url=Pratos.php">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Negado</title>
   </head>
   <body style= "text-align: center; color: #120a8f; font-size: 2rem; font-weight: bold; background-color: #F0FFFF">
       <div style="margin-top: 10%">
       <img src="../icons/You_Shall_Not_Pass!_0-1_screenshot.jpg" alt="check" style= "width: 25%">
       </div>
   </body>
   </html> 
   <?php
exit;}
?>

<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css">
<script href="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>


  <div class="col-md-5 col-lg-8" style="margin: 5rem auto 10rem; ">
        <h4 class="mb-3">Adicione o novo admnistrador</h4>
        <form class="needs-validation" novalidate="" method="post" action="../../validacoes/validaAdmnistrador.php">
          <div class="row g-3">
            <div class="col-sm-5" style="margin: 2rem 2rem 1.5rem 0">
              <label for="firstName" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" placeholder="" value="" required="" name="nome">
              <div class="invalid-feedback">
                Este campo é obrigatorio
              </div>
            </div>

            <div class="col-sm-5" style="margin-top: 2rem">
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

          <button class="btn btn-primary btn-lg" type="submit" style="width: 28%; margin: 4rem auto -5rem auto">Continuar</button>
        </form>
  </div>
</div>

  


<?php  include_once "../includes/footer.php"; ?>