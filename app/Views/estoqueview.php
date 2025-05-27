<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Estoque Manager</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="header-content">
                        <div class="header-title">                <h1><i class="fas fa-chart-line"></i> Dashboard</h1>            </div>
            <nav>
                <a href="<?= base_url('fornecedores') ?>" class="nav-link">
                    <i class="fas fa-truck"></i> Fornecedores
                </a>
                <a href="<?= base_url('clientes') ?>" class="nav-link">
                    <i class="fas fa-users"></i> Clientes
                </a>
            </nav>
        </div>
    </header>

    <main class="container fade-in">
        <!-- Cards de Resumo -->
        <div class="dashboard-grid">
            <!-- Card de Clientes -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-info">
                    <h3>Total de Clientes</h3>
                    <div class="card-value"><?= $total_clientes ?? 0 ?></div>
                    <p class="card-label">clientes ativos</p>
                </div>
                <div class="card-actions">
                    <a href="<?= base_url('clientes') ?>" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Visualizar
                    </a>
                    <a href="<?= base_url('addclientes') ?>" class="btn btn-success">
                        <i class="fas fa-plus"></i> Novo
                    </a>
                </div>
            </div>

            <!-- Card de Fornecedores -->
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="card-info">
                    <h3>Total de Fornecedores</h3>
                    <div class="card-value"><?= isset($total_fornecedores) ? $total_fornecedores : '0' ?></div>
                    <p class="card-label">fornecedores ativos</p>
                </div>
                <div class="card-actions">
                    <a href="<?= base_url('fornecedores') ?>" class="btn btn-primary">
                        <i class="fas fa-eye"></i> Visualizar
                    </a>
                    <a href="<?= base_url('addfornecedores') ?>" class="btn btn-success">
                        <i class="fas fa-plus"></i> Novo
                    </a>
                </div>
            </div>
        </div>

        <?php if (isset($debug)): ?>
        <div class="debug-section" style="margin: 20px; padding: 20px; background: #f5f5f5; border: 1px solid #ddd;">
            <h3>Informações de Debug:</h3>
            <pre>
Total pelo Model: <?= $debug['total_pelo_model'] ?>

Tabelas no Banco:
<?= print_r($debug['tabelas_existentes'], true) ?>

Colunas da Tabela Clientes:
<?= print_r($debug['colunas_clientes'], true) ?>

Resultado da Query:
<?= print_r($debug['query_result'], true) ?>
            </pre>
        </div>
        <?php endif; ?>

        <!-- Últimas Atividades -->
        <div class="activity-section">
            <h2><i class="fas fa-clock"></i> Últimas Atividades</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Tipo</th>
                            <th>Descrição</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($atividades) && is_array($atividades)) : ?>
                            <?php foreach ($atividades as $atividade) : ?>
                                <tr>
                                    <td><?= esc($atividade['data']) ?></td>
                                    <td>
                                        <span class="activity-type">
                                            <?= esc($atividade['tipo']) ?>
                                        </span>
                                    </td>
                                    <td><?= esc($atividade['descricao']) ?></td>
                                    <td>
                                        <span class="badge <?= $atividade['status'] ? 'badge-success' : 'badge-warning' ?>">
                                            <?= $atividade['status'] ? 'Concluído' : 'Pendente' ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" class="text-center">Nenhuma atividade registrada</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <div class="theme-switch-wrapper">
        <label class="theme-switch" for="theme-switch">
            <input type="checkbox" id="theme-switch">
            <span class="slider"></span>
        </label>
    </div>

    <script src="<?= base_url('js/theme.js') ?>"></script>
</body>
</html>

<style>
/* Estilos específicos para o Dashboard */
.dashboard-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.dashboard-card {
    background: var(--bg-primary);
    border-radius: 1rem;
    padding: 1.5rem;
    box-shadow: var(--card-shadow);
    border: 1px solid var(--border-color);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.dashboard-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.card-icon {
    font-size: 2rem;
    color: var(--accent-primary);
    margin-bottom: 1rem;
}

.card-info h3 {
    font-size: 1.1rem;
    color: var(--text-secondary);
    margin-bottom: 0.5rem;
}

.card-value {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.25rem;
}

.card-label {
    color: var(--text-secondary);
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.card-actions {
    display: flex;
    gap: 0.75rem;
    margin-top: 1rem;
}

.activity-section {
    margin-top: 2rem;
}

.activity-section h2 {
    font-size: 1.5rem;
    color: var(--text-primary);
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.activity-type {
    display: inline-flex;
    align-items: center;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 500;
    background-color: var(--bg-accent);
    color: var(--accent-primary);
}

/* Responsividade */
@media (max-width: 768px) {
    .header-content {
        flex-direction: column;
        gap: 1rem;
    }

    .header-title {
        width: 100%;
        justify-content: center;
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-card {
        padding: 1.25rem;
    }

    .card-actions {
        flex-direction: column;
    }

    .card-actions .btn {
        width: 100%;
    }
}

/* Novo estilo para o header com home icon */
.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

.header-title {
    display: flex;
    align-items: center;
    gap: 1rem;
}


</style>
