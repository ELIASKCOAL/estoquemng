<?php
namespace App\Controllers;

use App\Models\ClienteModel;

class Clientes extends BaseController
{
    public function index()
    {
        $model = new ClienteModel();
        $data['clientes'] = $model->findAll();
        return view('clientes', $data);
    }

    public function add()
    {
        $model = new ClienteModel();

        // Captura os dados enviados via JSON no corpo da requisição
        $data = $this->request->getJSON(true); // true => array associativo

        // Validações básicas
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

    public function delete($id = null)
    {
        if (!$id) {
            return redirect()->to(base_url('clientes'))->with('error', 'ID do cliente não fornecido');
        }

        $model = new ClienteModel();
        
        if ($model->delete($id)) {
            session()->setFlashdata('toast', [
                'type' => 'success',
                'message' => 'Cliente excluído com sucesso!'
            ]);
            return redirect()->to(base_url('clientes'));
        } else {
            session()->setFlashdata('toast', [
                'type' => 'error',
                'message' => 'Erro ao excluir cliente'
            ]);
            return redirect()->to(base_url('clientes'));
        }
    }
}
?>
