<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Lista de Anuidades</title>

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

    <h1>Lista de Anuidades</h1>
    <a href="index.php?page=anuidade&action=cadastrar" class="btn btn-success">Cadastrar Nova Anuidade</a>
    <table border="1">
        <thead>
            <tr>
                <th>Ano</th>
                <th>Valor (R$)</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anuidades as $anuidade): ?>
                <tr>
                    <td><?= $anuidade['ano'] ?></td>
                    <td>R$ <?= number_format($anuidade['valor'], 2, ',', '.') ?></td>
                    <td>
                        <a href="index.php?page=anuidade&action=edit&id=<?= $anuidade['id'] ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php">Voltar para o início</a>
</body>

</html>