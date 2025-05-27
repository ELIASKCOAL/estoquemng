<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Fornecedor - Estoque Manager</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/toast.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    /* Layout Principal */
    main.container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }

    /* Formulário */
    .form-container {
        background: var(--card-background);
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: var(--shadow);
        border: 1px solid var(--gray-light);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--text-color);
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--gray-medium);
        border-radius: var(--border-radius);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        outline: none;
    }

    .form-check {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .form-check input[type="checkbox"] {
        width: 1.2rem;
        height: 1.2rem;
        border-radius: 0.25rem;
        border: 1px solid var(--gray-medium);
    }

    .btn-container {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        color: white;
        padding: 0.75rem 2rem;
        border: none;
        border-radius: var(--border-radius);
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow);
    }

    .btn-cancel {
        background: var(--gray-light);
        color: var(--text-color);
        padding: 0.75rem 2rem;
        border: none;
        border-radius: var(--border-radius);
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        background: var(--gray-medium);
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 1.5rem;
        }

        .btn-container {
            flex-direction: column;
        }

        .btn-submit,
        .btn-cancel {
            width: 100%;
            text-align: center;
        }
    }
    </style>
</head>
<body>
    <header>
        <h1>Adicionar Novo Fornecedor</h1>
        <nav>
            <a href="<?= base_url('/') ?>" class="nav-link">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="<?= base_url('fornecedores') ?>" class="nav-link">
                <i class="fas fa-truck"></i> Lista de Fornecedores
            </a>
        </nav>
    </header>

    <main class="container fade-in">
        <div class="form-container">
            <form action="<?= base_url('fornecedores/create') ?>" method="POST">
                <div class="form-group">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control" required 
                           minlength="3" maxlength="100" value="<?= old('nome') ?>">
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required 
                           maxlength="100" value="<?= old('email') ?>">
                </div>

                <div class="form-group">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="tel" id="telefone" name="telefone" class="form-control" required 
                           minlength="10" maxlength="15" value="<?= old('telefone') ?>">
                </div>

                <div class="form-check">
                    <input type="checkbox" id="status" name="status" value="1" checked>
                    <label for="status" class="form-label" style="margin-bottom: 0">Fornecedor Ativo</label>
                </div>

                <div class="btn-container">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Salvar Fornecedor
                    </button>
                    <a href="<?= base_url('fornecedores') ?>" class="btn-cancel">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
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