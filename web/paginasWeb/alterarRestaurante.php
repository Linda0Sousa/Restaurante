<?php

include_once "../includes/header.php";
if ($_SESSION['perfil'] != 3) {
  header("Location: pratos.php");
  exit;
}

?>

<!-- isto vai alterar o perfil do restaurante -->

<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css">
<script href="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="col-md-6 col-lg-6" style="margin: 5rem auto 10rem; ">
        <h4 class="mb-3">Modificar o restaurante</h4>
        <form class="needs-validation" novalidate="" method="post" action="../../mudarEstados/mudarRestaurante.php?id=<?php echo $_GET['id']?>">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" placeholder="" value="" name="nome">
              <div class="invalid-feedback">
                Este campo é obrigatorio
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label">Numero de telemovel Do restaurante</label>
              <input type="" class="form-control" id="control" placeholder="" name="tlm">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label">Numero de telefone Do restaurante</label>
              <input type="" class="form-control" id="control" placeholder="" name="tlf">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-sm-6">
              <label for="address2" class="form-label">Numero de telemovel do responsável</label>
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
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="rua">
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
              <select class="form-select" id="country" name="pais">
                <option value="">Escolha um pais válido...</option>
                <option>Portugal</option>
              </select>
              <div class="invalid-feedback">
                Serviços indisponíveis nesse pais
              </div>
            </div>

            <div class="col-md-7">
              <label for="state" class="form-label">Localidade do Restaurante:</label>
              <select class="form-select" id="state" name="localidade">
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
              <input type="text" class="form-control" id="zip" placeholder="" name="codigoPostal">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Nif</label>
              <input type="number" class="form-control" id="address" placeholder="" name="nif">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">webpage</label>
              <input type="text" class="form-control" id="address" placeholder="" name="webpage">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Nome do Responsavel</label>
              <input type="text" class="form-control" id="address" placeholder="" name="responsavel">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Hora de Abertura</label>
              <input type="text" class="form-control" id="address" placeholder="Coloque no formato de relogio digital" name="Habertura">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Hora de fecho</label>
              <input type="text" class="form-control" id="address" placeholder="Coloque no formato de relogio digital" name="Horafecho">
              <div class="invalid-feedback">
              Este campo é obrigatorio
              </div>
            </div>

            <h6>Dias Take Away</h6>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="segunda" value="monday"> Segunda<br>
              <input class="form-check-input" type="checkbox" name="terca" value="tuesday"> Terça<br>
              <input class="form-check-input" type="checkbox" name="quarta" value="wednesday"> Quarta<br>
              <input class="form-check-input" type="checkbox" name="quinta" value="thursday"> Quinta<br>
              <input class="form-check-input" type="checkbox" name="sexta" value="friday"> Sexta<br>
              <input class="form-check-input" type="checkbox" name="sabado" value="saturday"> Sabado<br>
              <input class="form-check-input" type="checkbox" name="domingo" value="sunday"> Domingo<br>
            </div>

          </div>

          <hr class="my-4">

          <h4 class="mb-3">Selecione o tipo de Pagamento</h4>

          <div style="margin-bottom: 3rem">
              <input class="form-check-input" type="checkbox" name="Mbway" value="MBway"> MBWay<br>
              <input class="form-check-input" type="checkbox" name="visa" value="visa"> Visa<br>
              <input class="form-check-input" type="checkbox" name="mutlibanco" value="multibanco">Multibanco<br>
              <input class="form-check-input" type="checkbox" name="numerario" value="numerario">Numerario<br>
              <input class="form-check-input" type="checkbox" name="cheque" value="cheque">Cheque<br>
          </div>

          <button class="w-20 btn btn-primary btn-lg" type="submit" style="margin-left: 43%">Continuar</button>
        </form>
      </div>

      <?php
      include_once "../includes/footer.php"; ?>