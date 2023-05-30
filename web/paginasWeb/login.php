<?php 

include_once "../includes/header.php";

?>

<link rel="stylesheet" href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css">

<body class="text-center;" style= "background-color:  #000d1a">

<div class="container w-25" >
  <form class="m-auto w-40" method="post" action="../../validacoes/validaLogin.php">
    <h1 class="h3 mb-3 fw-normal" style="margin-top: 7rem;">Olá!</h1>

    <div class="form-floating" style="margin: 3rem auto 0 auto;">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" style="margin-bottom: 1rem;">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" style="margin-bottom: 1rem;">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Lembrar-me
        <p>Ainda não tem conta? Faça <a href="formularioCliente.php">registro</a></p>
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" style="margin-bottom: 8rem" type="submit">Sign in</button>
  </form>
</div>

    
  

</body>

<script src="https://getbootstrap.com/docs/5.3/assets/js/color-modes.js"></script>


<?php
      include_once "../includes/footer.php"; 
      ?>