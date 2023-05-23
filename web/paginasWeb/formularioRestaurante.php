<?php 

include_once "../includes/header.php"; 

?>

<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css">
<script href="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="col-md-6 col-lg-6" style="margin: 5rem auto 10rem; ">
        <h4 class="mb-3">Registro de restaurante</h4>
        <form class="needs-validation" novalidate="" method="post" action="../../validacoes/validaRestaurante.php">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" placeholder="" value="" required="" name="nome">
              <div class="invalid-feedback">
                Este campo é obrigatorio
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label" >Numero de telemovel Do restaurante</label>
              <input type="" class="form-control" id="control" placeholder="" name="tlm">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label" >Numero de telemovel do responsável</label>
              <input type="" class="form-control" id="control" placeholder="" name="tlmResponsavel">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label">Designação</label>
              <input type="" class="form-control" id="control" placeholder="" name="designacao">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-sm-9">
              <label for="address1" class="form-label">Rua</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="" name="rua">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-sm-3">
              <label for="address2" class="form-label">Porta</label>
              <input type="" class="form-control" id="address2" placeholder="" name="porta">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Pais</label>
              <select class="form-select" id="country" required="" name="pais">
                <option value="">Escolha um pais válido...</option>
                <option>Portugal</option>
              </select>
              <div class="invalid-feedback">
                Serviços indisponíveis nesse pais
              </div>
            </div>

            <div class="col-md-7">
              <label for="state" class="form-label">Localidade do Restaurante:</label>
              <select class="form-select" id="state" required="" name="localidade">
                <option value="">Escolha uma localidade valida...</option>
                <option>Lagoa</option>
                <option>Ponta Delgada</option>
              </select>
              <div class="invalid-feedback">
              Serviços indisponíveis nessa Localidade
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Codigo Postal</label>
              <input type="text" class="form-control" id="zip" placeholder="" required="" name="codigoPostal">
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

            <div class="col-12">
              <label for="email" class="form-label">Nif</label>
              <input type="number" class="form-control" id="address" placeholder="" required="" name="nif">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Hora de Abertura</label>
              <input type="text" class="form-control" id="address" placeholder="Coloque no formato de relogio digital" required="" name="Habertura">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Hora de fecho</label>
              <input type="text" class="form-control" id="address" placeholder="Coloque no formato de relogio digital" required="" name="Horafecho">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <h6>Dias Take Away (pode alterar mais tarde)</h6>
            <div class="input">
              <input type="checkbox" name="elementos[]" value="monday"> Segunda<br>
              <input type="checkbox" name="elementos[]" value="tuesday"> Terça<br>
              <input type="checkbox" name="elementos[]" value="wednesday"> Quarta<br>
              <input type="checkbox" name="elementos[]" value="thursday"> Quinta<br>
              <input type="checkbox" name="elementos[]" value="friday"> Sexta<br>
              <input type="checkbox" name="elementos[]" value="saturday"> Sabado<br>
              <input type="checkbox" name="elementos[]" value="sunday"> Domingo<br>
            </div>

          </div>

          <hr class="my-4">

          <h4 class="mb-3">Selecione o tipo de Pagamento</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
              <label class="form-check-label" for="credit" name="credito">Cartão de Credito</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
              <label class="form-check-label" for="debit" name="debito">Cartão de Débito</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
              <label class="form-check-label" for="paypal" name="paypal">PayPal</label>
            </div>
          </div>
          <hr class="my-4">

          <button class="w-20 btn btn-primary btn-lg" type="submit" style="margin-left: 43%">Continuar</button>
        </form>
      </div>

      <?php
      include_once "../includes/footer.php"; ?>