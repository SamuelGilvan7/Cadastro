<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alteração de Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body>
    <?php 
        include "conexao.php";

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['data_nascimento'];

        $sql = "UPDATE pessoas 
                SET nome = '$nome',
                    endereco = '$endereco',
                    telefone = '$telefone',
                    email = '$email',
                    data_nascimento = '$data_nascimento'
                WHERE cod_pessoas = $id";

        if (mysqli_query($conn, $sql)) {
            mensagem("$nome alterado com sucesso!", 'success');
        } else {
            mensagem("$nome NÃO foi alterado!", 'danger');
        }
    ?> 

<a href="pesquisa.php" class="btn btn-primary">Voltar</a>
   <!-- JavaScript <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->
  </body>
</html>