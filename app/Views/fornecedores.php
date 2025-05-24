<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores - Estoque Manager</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <h1>Gerenciar Fornecedores</h1>
        <nav>
            <a href="<?= base_url('/') ?>" class="nav-link">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="<?= base_url('addfornecedores') ?>" class="nav-link">Novo Fornecedor</a>
        </nav>
    </header>

    <main class="container fade-in">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($fornecedores) && is_array($fornecedores)) : ?>
                        <?php foreach ($fornecedores as $fornecedor) : ?>
                            <tr>
                                <td><?= esc($fornecedor['nome']) ?></td>
                                <td><?= esc($fornecedor['email']) ?></td>
                                <td><?= esc($fornecedor['telefone']) ?></td>
                                <td>
                                    <span class="badge <?= $fornecedor['status'] ? 'badge-success' : 'badge-warning' ?>">
                                        <?= $fornecedor['status'] ? 'Ativo' : 'Inativo' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?= base_url('editfornecedor/' . $fornecedor['id']) ?>" class="btn btn-primary">Editar</a>
                                    <button onclick="deleteFornecedor(<?= $fornecedor['id'] ?>)" class="btn btn-danger">Excluir</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">Nenhum fornecedor cadastrado</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <div class="theme-switch-wrapper">
        <label class="theme-switch" for="theme-switch">
            <input type="checkbox" id="theme-switch">
            <span class="slider"></span>
        </label>
    </div>

    <script src="<?= base_url('js/theme.js') ?>"></script>
    <script>
    function deleteFornecedor(id) {
        if (confirm('Tem certeza que deseja excluir este fornecedor?')) {
            window.location.href = '<?= base_url('deletefornecedor/') ?>' + id;
        }
    }
    </script>
</body>
</html>
