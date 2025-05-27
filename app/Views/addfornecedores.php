<!DOCTYPE html>
<html lang="pt-br" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Fornecedor - Estoque Manager</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <h1>Novo Fornecedor</h1>
        <nav>
            <a href="<?= base_url('/') ?>" class="nav-link">
                <i class="fas fa-home"></i> Dashboard
            </a>
            <a href="<?= base_url('fornecedores') ?>" class="nav-link">
                <i class="fas fa-arrow-left"></i> Voltar para Fornecedores
            </a>
        </nav>
    </header>

    <main class="container fade-in">
        <div class="form-container">
            <form id="fornecedorForm" action="<?= base_url('addfornecedores/salvar') ?>" method="post">
                <div class="form-group">
                    <label class="form-label" for="nome">
                        <i class="fas fa-building"></i> Nome da Empresa
                    </label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="documento">
                        <i class="fas fa-id-card"></i> CNPJ
                    </label>
                    <input type="text" id="documento" name="documento" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="email">
                        <i class="fas fa-envelope"></i> Email
                    </label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="telefone">
                        <i class="fas fa-phone"></i> Telefone
                    </label>
                    <input type="tel" id="telefone" name="telefone" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="endereco">
                        <i class="fas fa-map-marker-alt"></i> Endereço
                    </label>
                    <input type="text" id="endereco" name="endereco" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="status">
                        <i class="fas fa-toggle-on"></i> Status
                    </label>
                    <select id="status" name="status" class="form-control">
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Salvar Fornecedor
                    </button>
                    <a href="<?= base_url('fornecedores') ?>" class="btn btn-danger">
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
    <script>
    document.getElementById('fornecedorForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        var formData = new FormData(this);
        
        fetch('<?= base_url('addfornecedores/salvar') ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                window.location.href = '<?= base_url() ?>?refresh=' + new Date().getTime();
            } else {
                alert(data.message || 'Erro ao salvar fornecedor');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Erro ao salvar fornecedor');
        });
    });
    </script>

    <style>
    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .form-label i {
        width: 20px;
        color: var(--accent-primary);
    }

    @media (max-width: 768px) {
        .form-actions {
            flex-direction: column;
        }

        .form-actions .btn {
            width: 100%;
        }
    }
    </style>
</body>
</html>