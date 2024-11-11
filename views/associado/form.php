<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Associado</title>

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

    <h1>Cadastrar Novo Associado</h1>
    <form action="index.php?page=associado&action=create" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required pattern="\d{11}" placeholder="Apenas números">

        <label for="data_filiacao">Data de Filiação:</label>
        <input type="date" id="data_filiacao" name="data_filiacao" required>

        <button type="submit" class="btn-success">Cadastrar</button>
    </form>
    <a href="?page=associado&action=list">Voltar</a>
</body>

</html>