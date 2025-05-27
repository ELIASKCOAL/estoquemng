<?php 
namespace App\Controllers;

use App\Models\ClienteModel;

class Addclientes extends BaseController {

    public function index() {
        return view('addclientes');
    }

    public function salvar() {
        $model = new ClienteModel();
        
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
                // Redireciona para o dashboard com um parâmetro de atualização
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Cliente salvo com sucesso!',
                    'redirect' => base_url('?refresh=' . time())
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Erro ao salvar cliente: ' . implode(', ', $model->errors())
                ])->setStatusCode(500);
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Erro ao salvar cliente: ' . $e->getMessage()
            ]);
        }
    }
}
