<?php 
namespace App\Controllers;

use App\Models\FornecedorModel;

class Addfornecedores extends BaseController
{
    public function index()
    {
        return view('addfornecedores'); 
    }

    public function postSalvar() {
        $model = new FornecedorModel();
        
        // Get the request data
        $data = [
            'nome' => $this->request->getPost('nome'),
            'documento' => $this->request->getPost('documento'),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'endereco' => $this->request->getPost('endereco'),
            'status' => $this->request->getPost('status')
        ];

        try {
            if ($model->insert($data)) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Fornecedor salvo com sucesso!',
                    'redirect' => base_url('?refresh=' . time())
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Erro ao salvar fornecedor: ' . implode(', ', $model->errors())
                ])->setStatusCode(500);
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Erro ao salvar fornecedor: ' . $e->getMessage()
            ]);
        }
    }
}
?>