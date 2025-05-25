<?php
namespace App\Controllers;

use App\Models\ClienteModel;

class Clientes extends BaseController
{
    public function index()
    {
        return view('clientes');
    }

    public function add()
    {
        $model = new ClienteModel();

        // Pega os dados do formulário
        $data = [
            'nome'     => trim($this->request->getPost('nome')),
            'email'    => trim($this->request->getPost('email')),
            'telefone' => trim($this->request->getPost('telefone')),
        ];

        // Validação simples
        if (empty($data['nome'])) {
            return $this->response->setJSON([
                'status' => 'erro',
                'mensagem' => 'O campo nome é obrigatório.'
            ])->setStatusCode(400);
        }

        if (empty($data['email'])) {
            return $this->response->setJSON([
                'status' => 'erro',
                'mensagem' => 'O campo email é obrigatório.'
            ])->setStatusCode(400);
        }

        if (empty($data['telefone'])) {
            return $this->response->setJSON([
                'status' => 'erro',
                'mensagem' => 'O campo telefone é obrigatório.'
            ])->setStatusCode(400);
        }

        // Insere no banco de dados
        if ($model->insert($data)) {
            return $this->response->setJSON([
                'status' => 'sucesso',
                'mensagem' => 'Cliente cadastrado com sucesso!'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'erro',
                'mensagem' => 'Erro ao cadastrar cliente.'
            ])->setStatusCode(500);
        }
    }
}
?>
