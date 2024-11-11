<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Lista de Associados</title>

    <link rel="stylesheet" href="../devs-rn/assets/css/style.css">
</head>

<body>
    <div class="message">
        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] == 'success'): ?>
                <p class="success">Cadastro realizado com sucesso!</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <h1>Lista de Associados</h1>
    <a href="?page=associado&action=cadastrar" class="btn btn-success">Cadastrar Novo Associado</a>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Data de Filiação</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($associados as $associado): ?>
                <tr>
                    <td><?= $associado['nome'] ?></td>
                    <td><?= $associado['email'] ?></td>
                    <td><?= $associado['cpf'] ?></td>
                    <td><?= date_format(date_create($associado['data_filiacao']), 'd/m/Y') ?></td>
                    <td>
                        <span class="<?= ($associado['status_pagamento'] == "Em Dia") ? "success" : "error"; ?>">
                            <?= $associado['status_pagamento'] ?>
                        </span>
                    </td>
                    <td>
                        <a href="?page=pagamento&action=checkout&associado=<?= $associado['associado_id'] ?>">Checkout</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php">Voltar para o início</a>
</body>

</html>