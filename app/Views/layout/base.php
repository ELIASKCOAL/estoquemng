<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Estoque Manager' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <a href="<?= base_url('/') ?>" class="sidebar-logo">
                Estoque Manager
            </a>
            <nav class="sidebar-nav">
                <a href="<?= base_url('/') ?>" class="nav-link <?= current_url() == base_url('/') ? 'active' : '' ?>">
                    Dashboard
                </a>
                <a href="<?= base_url('clientes') ?>" class="nav-link <?= strpos(current_url(), 'clientes') !== false ? 'active' : '' ?>">
                    Clientes
                </a>
                <a href="<?= base_url('fornecedores') ?>" class="nav-link <?= strpos(current_url(), 'fornecedores') !== false ? 'active' : '' ?>">
                    Fornecedores
                </a>
            </nav>

            <!-- Theme Switch -->
            <div class="theme-switch-wrapper">
                <label class="theme-switch" for="theme-switch">
                    <input type="checkbox" id="theme-switch">
                    <span class="slider"></span>
                </label>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="card-header">
                <h1 class="card-title"><?= $header ?? 'Estoque Manager' ?></h1>
            </div>
            <?= $content ?? '' ?>
        </main>
    </div>

    <script src="<?= base_url('js/theme.js') ?>"></script>
</body>
</html> 