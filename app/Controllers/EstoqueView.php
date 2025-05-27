<?php
namespace App\Controllers;

use App\Models\ClienteModel;
use App\Models\FornecedorModel;

class EstoqueView extends BaseController
{
    public function index()
    {
        // Adiciona headers para evitar cache
        $this->response->setHeader('Cache-Control', 'no-store, max-age=0, no-cache, must-revalidate');
        $this->response->setHeader('Cache-Control', 'post-check=0, pre-check=0');
        $this->response->setHeader('Pragma', 'no-cache');
        
        // Instancia os modelos
        $clienteModel = new ClienteModel();
        $fornecedorModel = new FornecedorModel();
        
        // Conecta ao banco para verificar
        $db = \Config\Database::connect();
        
        // Faz a contagem das tabelas
        $queryClientes = $db->query('SELECT COUNT(*) as total FROM clientes');
        $queryFornecedores = $db->query('SELECT COUNT(*) as total FROM fornecedores');
        
        // Prepara os dados
        $data = [
            'total_clientes' => $queryClientes->getRow()->total,
            'total_fornecedores' => $queryFornecedores->getRow()->total,
            'timestamp' => time()
        ];
        
        // Retorna a view com os dados
        return view('estoqueview', $data);
    }
}
 ?>