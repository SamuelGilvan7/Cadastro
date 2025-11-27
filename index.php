<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="cadastro_script.php" method="post">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" placeholder="Informe o seu nome..."  name="nome"  required>
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" placeholder="Informe o seu endereço..." name="endereco" required >
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" placeholder="Digite o seu número..." name="telefone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" placeholder="Informe o seu E-mail..." name="endereco"  required>
                    </div>
                    <div class="mb-3">
                        <label for="nascimento" class="form-label">Data de nascimeto</label>
                        <input type="date" class="form-control"  name="data_nascimento" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success"  >
                    </div>
                    
                </form>
            </div> 
        </div>
    </div>
   <!-- JavaScript <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->
  </body>
</html>