<?php 
include_once "../includes/header.php"; 
?>


  <main style="margin-bottom: 3rem">
    <div class="py-5 text-center" style="background-image: url('../icons/hamburger.jpg'); background-repeat: no-repeat;
  background-size: cover; background-position: center; margin-bottom: 4rem;">
      <h2>Novo Prato</h2>
      <p class="lead">O novo prato não será adicionado à ementa até que seja aprovado pelo administrador</p>
    </div>
    <div class="container">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last" style="border-radius: 1px black solid">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Imagem</span>
          <span class="badge bg-primary rounded-pill">Max: 2MB</span>
        </h4>
    </div>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Detalhes</h4>
        <form class="needs-validation" novalidate="">
          <div class="row g-3" style="margin-bottom: 5rem">
            <div class="col-sm-3">
              <label for="firstName" class="form-label">Nome:</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-3">
              <label for="lastName" class="form-label">Descrição:</label>
              <input type="text" class="form-control" id="lastName" placeholder="Ex: 3 porções de batatas fritas..." value="" required="">
              <div class="invalid-feedback">
                Descrição inválida
              </div>
            </div>

            <div class="col-3">
              <label for="email" class="form-label">Preço: <span class="text-body-secondary">(iva incluido)</span></label>
              <input type="number" class="form-control" id="email" placeholder="">
              <div class="invalid-feedback">
                Preço inválido
              </div>
            </div>

            <div class="col-md-3">
              <label for="country" class="form-label">Tipo de Prato:</label>
              <select class="form-select" id="country" required="">
                <option value="">Opções:</option>
                <option>Entradas</option>
                <option>Sopas</option>
                <option>Pratos de Peixe</option>
                <option>Pratos de Carne</option>
                <option>Vegetariano</option>
                <option>Sobremesas</option>
                <option>Bebidas</option>
              </select>
              <div class="invalid-feedback">
                Essa opção não consta na lista
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="btn btn-primary btn-lg" type="submit" style="margin: 2rem auto 0 auto; width: 13vw">Confirmar</button>
        </form>
      </div>
    </div>
  </main>
</div>
<script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
include_once "../includes/footer.php";
?>