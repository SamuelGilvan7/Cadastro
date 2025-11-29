<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesquisar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body>
   <!-- Começo em PHP ---> 
    <?php 

        $pesquisa = $_POST['busca'] ?? '';

        

        include "conexao.php";

        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

        $dados = mysqli_query($conn, $sql);


    ?>
  <!-- Fim em PHP ---> 


    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>
                    <nav class="navbar bg-body-tertiary">
                        <div class="container-fluid">
                            <form class="d-flex" role="search" action="pesquisa.php" method="post">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busca" autofocus/>
                            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                            </form>
                        </div>
                    </nav>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de Nascimento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                while($linha = mysqli_fetch_assoc($dados)){
                                    $cod_pessoas = $linha['cod_pessoas'];
                                    $nome = $linha['nome'];
                                    $enderco = $linha['endereco'];
                                    $telefone = $linha['telefone'];
                                    $email = $linha['email'];
                                    $data_nascimento = $linha['data_nascimento'];

                                    echo "
                                            <tr>
                                            <th scope='row'>$nome</th>
                                            <td>$enderco</td>
                                            <td>$telefone</td>
                                            <td>$email</td>
                                            <td>$data_nascimento</td>
                                            
                                            </tr>
                                        ";
                                }
                            ?>  
                           
                           
                        </tbody>
                    </table>
                <a href="index.php" class="btn btn-info">Voltar para o Início</a>
            </div> 
        </div>
    </div>
   <!-- JavaScript <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->
  </body>
</html>
