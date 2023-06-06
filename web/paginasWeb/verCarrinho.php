<?php

session_start();
//verificar se existe uma sessão iniciada e se é cliente

if($_SESSION['perfil']!=2 || !isset($_SESSION['utilizador']))
{
  header("Location: login.php");
}

include "../includes/header.php";
include "../../classes/MyConnect.php";
include_once "../../classes/Model.php";
require_once "../../classes/Clientes.php";
require_once "../../classes/Ementas.php";


$conexao = MyConnect::getInstance();
 ?>

<body style="background-color: black; ">

          <div class="table-responsive" style="background-color: white; margin: 5% 5%">
            <table class="table table-striped table-sm" style="text-align: center;">
              <thead>
                <tr>
                  <th style="padding: 1rem">Nome</th>
                  <th style="padding: 1rem">Descrição</th>
                  <th style="padding: 1rem">Quantidade</th>
                  <th style="padding: 1rem">Preço</th>
                  <th style="padding: 1rem">Informações</th>
                  <th style="padding: 1rem">Apagar</th>
                  <th style="padding: 1rem">Confirmar</th>
                </tr>
              </thead>
              <tbody>
              <?php  
               $resultados = $_SESSION['carrinho'];
               foreach ($resultados as $id => $quantidade) {
                   $ementa = Ementas::find($id)
              ?>
              <tr>
                  <td style="padding: 1rem"><?php echo $ementa->getNome(); ?></td>
                  <td style="padding: 1rem"><?php echo $ementa->getDescricao(); ?></td>
                  <td style ="padding 1rem"><?php echo $quantidade; ?> </td>
                  <td style="padding: 1rem"><?php echo $quantidade * $ementa->getPreco(); ?>€</td>
                  <td style="padding: 1rem"> <a href="detalhesPrato.php?id=<?php echo $ementa->getId() ?>" class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-info fa-fw"></i></td>
                                    <td style="padding: 1rem">  <a href="../../validacoes/apagarCarrinho.php?&id=<?php echo $id ?>" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-cart-arrow-down"></i>
                                </a></td>
                        
                  <td style="padding: 1rem"><a href="../../mudarEstados/estadocarrinho.php?quantidade=<?php echo $quantidade; ?>&id=<?php echo $id ?>">Confirmar</a></td>
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
