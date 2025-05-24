<?php 
namespace App\Controllers;

class AddFornecedores extends BaseController
{
    public function index()
    {
        return view('addfornecedores'); 
    }

    public function salvar() {
        // Get the request data
        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'status' => $this->request->getPost('status')
        ];

        try {
            // TODO: Add your database insertion logic here
            // For now, we'll just simulate a successful save
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Fornecedor salvo com sucesso!'
            ]);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Erro ao salvar fornecedor: ' . $e->getMessage()
            ]);
        }
    }
}
?>