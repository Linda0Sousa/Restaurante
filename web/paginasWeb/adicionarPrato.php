<?php 

session_start();

if($_SESSION['perfil'] != 3){
  ?> <!DOCTYPE html>
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
       <p>Nah</p>
       <img src="../icons/naos.png" alt="check" style= "width: 25%">
       <p>Está quieto</p>
       </div>
   </body>
   </html> 
   <?php
exit; }

include_once "../includes/header.php"; 


?>


  <main style="margin-bottom: 3rem">
    <div class="py-5 text-center" style="background-image: url('../icons/hamburger.jpg'); background-repeat: no-repeat;
  background-size: cover; background-position: center; margin-bottom: 4rem;">
      <h2>Novo Prato</h2>
      <p class="lead">O novo prato não será adicionado à ementa até que seja aprovado pelo administrador</p>
    </div>

    <div class="container">
    <form action="../../validacoes/validaPrato.php" enctype="multipart/form-data" method="post">
      <div class="col-md-7 col-lg-8" style="margin: auto">

        <h4 class="mb-3">Detalhes</h4>
          <div class="row g-3" style="margin-bottom: 5rem">
            <div class="col-sm-3">
              <label for="firstName" class="form-label">Nome:</label>
              <input type="text" name="nome" class="form-control" id="firstName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-3">
              <label for="lastName" class="form-label">Descrição:</label>
              <input type="text" class="form-control"  name="descricao" id="lastName" placeholder="Ex: 3 porções de batatas fritas..." value="" required="">
              <div class="invalid-feedback">
                Descrição inválida
              </div>
            </div>

            <div class="col-3">
              <label for="email" class="form-label">Preço: <span class="text-body-secondary">(iva incluido)</span></label>
              <input name="preco" type="float" name="descricao" class="form-control" id="email" placeholder="" name="nome">
              <div class="invalid-feedback">
                Preço inválido
              </div>
            </div>

            <div class="col-md-3">
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
              <div class="invalid-feedback">
                Essa opção não consta na lista
              </div>
            </div>

            <div class="row g-3">
            <label for="image" class="form-label">Imagem</label>
            <div class="col-12">
            <input type="file" name="image" class="form-control">
            </div>            
            </div>
          </div>

          <hr class="my-4">
          
          <button class="btn btn-primary btn-lg" type="submit" style="margin: 2rem 37% 0 ; width: 13vw;">Confirmar</button>
        </form>
      </div>
    </div>
  </main>
</div>
<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
include_once "../includes/footer.php";
?>