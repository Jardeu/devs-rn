<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pagamento de Anuidades</title>

    <link rel="stylesheet" href="../devs-rn/assets/css/style.css">
</head>

<body>
    <div class="message">
        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] == 'success'): ?>
                <p class="success">Pagamento realizado com sucesso!</p>
            <?php elseif ($_GET['status'] == 'error'): ?>
                <p class="error">Erro ao realizar pagamento.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <main class="checkout-container">
        <h1>Pagamento de Anuidades</h1>
        <?php if ($pagamento): ?>
            <div>
                <p><strong>Nome:</strong> <?= $pagamento[0]['nome'] ?></p>
                <p><strong>Data de Filiação:</strong> <?= date_format(date_create($pagamento[0]['data_filiacao']), 'd/m/Y') ?></p>
            </div>
            <div>
                <p><strong>Anuidades devidas: </strong></p>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Ano</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagamento as $pag): ?>
                            <tr>
                                <td><?= $pag['ano'] ?></td>
                                <td><?= $pag['valor'] ?></td>
                                <td>
                                    <a href="index.php?page=pagamento&action=pagar&associado=
                                        <?= $pag['associado_id'] ?>&anuidade=<?= $pag['anuidade_id'] ?>"
                                        class="btn-success">Pagar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p><strong>Valor total devido:</strong> R$ <?= $pagamento[0]['total_devido'] ?></p>
            </div>
        <?php else: ?>
            <p>Este associado não possui anuidades pendentes.</p>
        <?php endif ?>
        <a href="?page=associado&action=list">Voltar</a>
    </main>
</body>

</html>