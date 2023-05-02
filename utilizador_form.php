<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registo de Utilizador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">

        <div class="row mt-3">
            <div class="col">
                <h3>Registo de Utilizador</h3>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <form action="regista_utilizador.php" method="post">

                    <div class="row">
                        <div class="col-2">
                            <label for="nome" class="col-2">Nome</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="nome" id="" class="form-control col-10">
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-2">
                            <label for="email" class="col-2">E-mail</label>
                        </div>
                        <div class="col-8">
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-2">
                            <label for="password" class="col-2">Palavra-Passe</label>
                        </div>
                        <div class="col-8">
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-2">
                            <label for="confirmacao" class="col-2">Confirmação</label>
                        </div>
                        <div class="col-8">
                            <input type="password" name="confirmacao" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <p class="text-center">
                                <button type="submit" class="btn btn-primary">Registar</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!--
            <p>Exemplos Boostrap GRID</p>
            <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary">Testes</div>
                    <div class="card-body">cenas</div>
                </div>
            </div>

            <div class="col-xs-12 col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-header bg-success">Testes</div>
                    <div class="card-body">cenas</div>
                </div>
            </div>
        </div> -->

    </div>
</body>
</html>