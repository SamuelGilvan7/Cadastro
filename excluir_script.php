<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exclusão de cadastro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-4">
    <div class="row">

        <?php 
            include "conexao.php";

            // Garantir que as variáveis existam
            $id = $_POST['id'] ?? 0;
            $nome = $_POST['nome'] ?? 'Registro';

            // Segurança: converte ID para inteiro
            $id = intval($id);

            if($id > 0){

                $sql = "DELETE FROM pessoas WHERE cod_pessoas = $id";

                if(mysqli_query($conn, $sql)){
                    mensagem("$nome excluído com sucesso!", 'success');
                } else {
                    mensagem("Erro ao excluir $nome!", 'danger');
                }

            } else {
                mensagem("ID inválido! Nada foi excluído.", 'warning');
            }
        ?> 

        <a href="index.php" class="btn btn-primary mt-3">Voltar</a>

    </div>
</div>
</body>
</html>
