<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores - Estoque Manager</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/toast.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    /* Layout Principal */
    main.container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }

    /* Cabeçalho */
    header {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        padding: 2rem 1.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow);
    }

    header h1 {
        text-align: center;
        color: white;
        font-size: 2rem;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }

    header nav {
        display: flex;
        justify-content: center;
        gap: 1rem;
        flex-wrap: wrap;
    }

    header .nav-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        color: white;
        text-decoration: none;
        background: rgba(255, 255, 255, 0.1);
        border-radius: var(--border-radius);
        transition: all 0.3s ease;
        font-weight: 500;
    }

    header .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }

    /* Tabela */
    .table-container {
        background: var(--card-background);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
        overflow: hidden;
        margin: 1rem 0;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 0;
    }

    .table th {
        background: var(--primary-color);
        color: white;
        font-weight: 600;
        text-align: left;
        padding: 1rem;
        font-size: 0.95rem;
    }

    .table td {
        padding: 1rem;
        border-bottom: 1px solid var(--gray-light);
        color: var(--text-color);
        font-size: 0.95rem;
    }

    .table tr:last-child td {
        border-bottom: none;
    }

    .table tr:hover td {
        background: var(--gray-light);
    }

    /* Badges */
    .badge {
        padding: 0.5rem 1rem;
        border-radius: 2rem;
        font-size: 0.85rem;
        font-weight: 500;
        display: inline-block;
    }

    .badge-success {
        background: var(--success-color);
        color: white;
    }

    .badge-warning {
        background: #fbbf24;
        color: #92400e;
    }

    /* Botões */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.2rem;
        border-radius: var(--border-radius);
        font-size: 0.9rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        margin: 0 0.25rem;
    }

    .btn i {
        font-size: 0.9rem;
    }

    .btn-primary {
        background: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
    }

    .btn-danger {
        background: var(--error-color);
        color: white;
    }

    .btn-danger:hover {
        background: #dc2626;
        transform: translateY(-2px);
    }

    /* Estado Vazio */
    .empty-state {
        background: var(--card-background);
        border-radius: var(--border-radius);
        padding: 3rem 2rem;
        text-align: center;
        box-shadow: var(--shadow);
        border: 1px solid var(--gray-light);
        margin: 2rem 0;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .empty-state:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        opacity: 0.8;
    }

    .empty-state h3 {
        color: var(--text-color);
        font-size: 1.5rem;
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .empty-state p {
        color: var(--gray-medium);
        margin-bottom: 2rem;
        font-size: 1.1rem;
    }

    .btn-add-empty {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 2rem;
        font-size: 1.1rem;
        font-weight: 500;
        color: white;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        border-radius: var(--border-radius);
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: var(--shadow);
    }

    .btn-add-empty:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        background: linear-gradient(135deg, var(--accent-color), var(--primary-color));
    }

    .btn-add-empty i {
        font-size: 1.2rem;
        margin: 0;
        opacity: 1;
        color: white;
    }

    /* Tema Switch */
    .theme-switch-wrapper {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background: var(--card-background);
        padding: 0.5rem;
        border-radius: 2rem;
        box-shadow: var(--shadow);
        z-index: 1000;
    }

    /* Animações */
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsividade */
    @media (max-width: 768px) {
        header h1 {
            font-size: 1.75rem;
        }

        .table-container {
            margin: 1rem -1rem;
            border-radius: 0;
        }

        .table th,
        .table td {
            padding: 0.75rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }

        .empty-state {
            padding: 2rem 1rem;
            margin: 1rem -1rem;
            border-radius: 0;
        }

        .empty-state i {
            font-size: 3rem;
        }

        .empty-state h3 {
            font-size: 1.25rem;
        }

        .empty-state p {
            font-size: 1rem;
        }

        .btn-add-empty {
            width: 100%;
            justify-content: center;
        }

        .theme-switch-wrapper {
            bottom: 1rem;
            right: 1rem;
        }
    }
    </style>
</head>
<body>
    <header>
        <h1>Gerenciar Fornecedores</h1>
        <nav>
            <a href="<?= base_url('/') ?>" class="nav-link">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="<?= base_url('addfornecedores') ?>" class="nav-link">
                <i class="fas fa-plus"></i> Novo Fornecedor
            </a>
        </nav>
    </header>

    <main class="container fade-in">
        <div class="table-container">
            <?php if (isset($fornecedores) && is_array($fornecedores) && count($fornecedores) > 0) : ?>
                <table class="table">
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
                                    <a href="<?= base_url('editfornecedor/' . $fornecedor['id']) ?>" class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <a href="<?= base_url('deletefornecedor/' . $fornecedor['id']) ?>" 
                                       class="btn btn-danger"
                                       onclick="return confirm('Tem certeza que deseja excluir o fornecedor \'<?= esc($fornecedor['nome']) ?>\'?')">
                                        <i class="fas fa-trash"></i> Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="empty-state">
                    <i class="fas fa-truck"></i>
                    <h3>Nenhum Fornecedor Cadastrado</h3>
                    <p>Você ainda não possui nenhum fornecedor cadastrado no sistema.</p>
                    <a href="<?= base_url('addfornecedores') ?>" class="btn-add-empty">
                        <i class="fas fa-plus-circle"></i>
                        Adicionar Primeiro Fornecedor
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <div class="theme-switch-wrapper">
        <label class="theme-switch" for="theme-switch">
            <input type="checkbox" id="theme-switch">
            <span class="slider"></span>
        </label>
    </div>

    <script src="<?= base_url('js/theme.js') ?>"></script>
    <script src="<?= base_url('js/toast.js') ?>"></script>
    <script>
    <?php if (session()->has('toast')): ?>
        <?php $toast = session()->get('toast'); ?>
        toast.show('<?= $toast['message'] ?>', '<?= $toast['type'] ?>');
    <?php endif; ?>
    </script>
</body>
</html>
