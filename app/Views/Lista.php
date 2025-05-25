<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Clientes Cadastrados</title>
</head>
<body>
    <h1>Clientes Cadastrados</h1>

    <?php if (empty($clientes)): ?>
        <p>Nenhum cliente cadastrado.</p>
    <?php else: ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= esc($cliente['id']) ?></td>
                    <td><?= esc($cliente['nome']) ?></td>
                    <td><?= esc($cliente['email']) ?></td>
                    <td><?= esc($cliente['telefone']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>
