<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesquisar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
    $pesquisa = $_POST['busca'] ?? '';

    include "conexao.php";

    $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";
    $dados = mysqli_query($conn, $sql);
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Pesquisar</h1>

            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex" role="search" action="pesquisa.php" method="post">
                        <input class="form-control me-2" type="search" placeholder="Search" name="busca" autofocus/>
                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </form>
                </div>
            </nav>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Data de Nascimento</th>
                        <th>Funções</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    while($linha = mysqli_fetch_assoc($dados)){
                        $cod_pessoas = $linha['cod_pessoas'];
                        $nome = $linha['nome'];
                        $endereco = $linha['endereco'];
                        $telefone = $linha['telefone'];
                        $email = $linha['email'];
                        $data_nascimento = $linha['data_nascimento'];
                        $foto = $linha['foto'];
                        if (!$foto == null) {
                            $mostra_foto = "<img src='img/$foto' style = 'width :250px; border-radius: 70px'>";
                        }   else {
                            $mostra_foto = '';
                        }

                        echo "
                            <tr>
                            
                                <th>$mostra_foto</th>
                                <th scope='row'>$nome</th>
                                <td>$endereco</td>
                                <td>$telefone</td>
                                <td>$email</td>
                                <td>$data_nascimento</td>
                                <td style='width: 150px;'>
                                    <a href='cadastro_edit.php?id=$cod_pessoas' class='btn btn-success'>Editar</a>

                                    <a href='#' 
                                       class='btn btn-danger' 
                                       data-bs-toggle='modal' 
                                       data-bs-target='#confirma'
                                       onclick=\"pegar_dados($cod_pessoas, '$nome')\">
                                       Excluir
                                    </a>
                                </td>
                            </tr>
                        ";
                    }
                ?>
                <!-- onclick=\"pegar_dados($cod_pessoas, '$nome')\" O segredo!!-->

                </tbody>
            </table>

            <a href="index.php" class="btn btn-info">Voltar para o Início</a>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5">Confirmação de exclusão:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>Deseja realmente excluir <b id="nome_pessoa" class="fw-bold text-danger">Nome da pessoa</b>?</p>
            </div>

            <div class="modal-footer">
                <form action="excluir_script.php" method="post">

                    <!-- ID da pessoa -->
                    <input type="hidden" name="id" id="cod_pessoa">

                    <!-- NOME da pessoa (AGORA EXISTE!) -->
                    <input type="hidden" name="nome" id="nome">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <input type="submit" class="btn btn-danger" value="Sim">

                </form>
            </div>

        </div>
    </div>
</div>
<script>
function pegar_dados(id, nome) {
    document.getElementById('nome_pessoa').innerHTML = nome;
    document.getElementById('cod_pessoa').value = id;
    document.getElementById('nome').value = nome;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
