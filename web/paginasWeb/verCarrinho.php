<?php

session_start();
//verificar se existe uma sessão iniciada e se é cliente

if($_SESSION['perfil']!=1 || !isset($_SESSION['utilizador']))
{
  header("Location: login.php");
}

include "../includes/header.php";
include "../../classes/MyConnect.php";
include_once "../../classes/Model.php";
require_once "../../classes/Clientes.php";

//o codigo sql vai buscar os ids das ementas que o utilizador encomendou

$sql = " select ementa.id from ementa
inner join encomenda_prato on encomenda_prato.ementa_id = ementa.id
inner join encomenda on encomenda.id = encomenda_prato.encomenda_id
where encomenda.cliente_id = " . $_SESSION['utilizador'] . " and encomenda.situacao_id =9;";

$conexao = MyConnect::getInstance();
 ?>



<body style="background-color: black;">

          <div class="table-responsive" style="background-color: white; margin: 5% 5%">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th style="padding: 1rem">Nome</th>
                  <th style="padding: 1rem">Descrição</th>
                  <th style="padding: 1rem">Preço</th>
                  <th style="padding: 1rem">Confirmar</th>
                  <th style="padding: 1rem">Remover</th>
                </tr>
              </thead>
              <tbody>
              <?php  
              $idEmentas = $conexao->query($sql);
              while ($idEmenta = $idEmentas->fetch_assoc()) {
                $TotalEmentas = $conexao->query("select * from ementa where ementa.id = " . $idEmenta['id'] . " ;");
                while ($ementa = $TotalEmentas->fetch_assoc()){
              ?>
              <tr>
                  <td style="padding: 1rem"><?php echo $ementa['nome']; ?></td>
                  <td style="padding: 1rem"><?php echo $ementa['descricao']; ?></td>
                  <td style="padding: 1rem"><?php echo $ementa['preco']; ?></td>
                  <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadocarrinho.php?estado=confirmar&id=".$idEmenta['id'];?>">Confirme</a></td>
                  <td style="padding: 1rem"><a href="<?php echo "../../mudarEstados/estadocarrinho.php?estado=retirar&id=".$idEmenta['id'];}?>">Retire</a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
  </div>

  <button></button>

</body>

  <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>

  <?php

include "../includes/footer.php";
?>
