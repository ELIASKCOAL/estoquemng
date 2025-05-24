<?php 
namespace App\Controllers;

class AddClientes extends BaseController {

    public function index() {
        return view('addclientes');
    }

    public function salvar() {
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
            // TODO: Add your database insertion logic here
            // For now, we'll just simulate a successful save
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Cliente salvo com sucesso!'
            ]);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'Erro ao salvar cliente: ' . $e->getMessage()
            ]);
        }
    }
}
