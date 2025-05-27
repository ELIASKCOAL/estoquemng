<?php

namespace App\Controllers;

use App\Models\ClienteModel;

class ClienteController extends BaseController
{
    protected $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new ClienteModel();
    }

    public function index()
    {
        $data['clientes'] = $this->clienteModel->findAll();
        return view('clientes', $data);
    }

    public function getCliente($id = null)
    {
        if ($id === null) {
            return redirect()->to('/clientes')->with('toast', [
                'type' => 'error',
                'message' => 'Cliente não encontrado.'
            ]);
        }

        $data['cliente'] = $this->clienteModel->find($id);
        
        if ($data['cliente'] === null) {
            return redirect()->to('/clientes')->with('toast', [
                'type' => 'error',
                'message' => 'Cliente não encontrado.'
            ]);
        }

        return view('editcliente', $data);
    }

    public function updateCliente($id = null)
    {
        if ($id === null) {
            return redirect()->to('/clientes')->with('toast', [
                'type' => 'error',
                'message' => 'Cliente não encontrado.'
            ]);
        }

        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'status' => $this->request->getPost('status') ? 1 : 0
        ];

        if ($this->clienteModel->update($id, $data)) {
            return redirect()->to('/clientes')->with('toast', [
                'type' => 'success',
                'message' => 'Cliente atualizado com sucesso!'
            ]);
        }

        return redirect()->back()->with('toast', [
            'type' => 'error',
            'message' => 'Erro ao atualizar cliente.'
        ])->withInput();
    }

    public function deleteCliente($id = null)
    {
        if ($id === null) {
            return redirect()->to('/clientes')->with('toast', [
                'type' => 'error',
                'message' => 'Cliente não encontrado.'
            ]);
        }

        if ($this->clienteModel->delete($id)) {
            return redirect()->to('/clientes')->with('toast', [
                'type' => 'success',
                'message' => 'Cliente excluído com sucesso!'
            ]);
        }

        return redirect()->to('/clientes')->with('toast', [
            'type' => 'error',
            'message' => 'Erro ao excluir cliente.'
        ]);
    }

    public function addCliente()
    {
        return view('addcliente');
    }

    public function createCliente()
    {
        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'status' => $this->request->getPost('status') ? 1 : 0
        ];

        if ($this->clienteModel->insert($data)) {
            return redirect()->to('/clientes')->with('toast', [
                'type' => 'success',
                'message' => 'Cliente cadastrado com sucesso!'
            ]);
        }

        return redirect()->back()->with('toast', [
            'type' => 'error',
            'message' => 'Erro ao cadastrar cliente.'
        ])->withInput();
    }
} 