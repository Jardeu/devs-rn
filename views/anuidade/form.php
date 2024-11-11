<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title><?= isset($anuidade_detalhada) ? 'Editar Anuidade' : 'Cadastrar Anuidade'; ?></title>

    <link rel="stylesheet" href="../devs-rn/assets/css/style.css">
</head>

<body>
    <div class="message">
        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] == 'error'): ?>
                <p class="error">Erro ao cadastrar. Tente novamente.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <h1><?= isset($anuidade_detalhada) ? 'Editar Anuidade' : 'Adicionar Anuidade'; ?></h1>

    <form action="index.php?page=anuidade&action=save" method="post">
        <input type="hidden" name="id" value="<?= isset($anuidade_detalhada['id']) ? $anuidade_detalhada['id'] : ''; ?>">

        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" value="<?= isset($anuidade_detalhada['ano']) ? htmlspecialchars($anuidade_detalhada['ano']) : ''; ?>" required>

        <label for="valor">Valor (R$):</label>
        <input type="text" name="valor" id="valor" value="<?= isset($anuidade_detalhada['valor']) ? number_format($anuidade_detalhada['valor'], 2, ',', '.') : ''; ?>" required>

        <button type="submit" class="btn-success"><?= isset($anuidade_detalhada) ? 'Salvar Alterações' : 'Cadastrar'; ?></button>
    </form>

    <a href="?page=anuidade&action=list">Voltar</a>
</body>

</html>