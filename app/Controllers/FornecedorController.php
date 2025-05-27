<?php

namespace App\Controllers;

use App\Models\FornecedorModel;

class FornecedorController extends BaseController
{
    protected $fornecedorModel;

    public function __construct()
    {
        $this->fornecedorModel = new FornecedorModel();
    }

    public function index()
    {
        $data['fornecedores'] = $this->fornecedorModel->findAll();
        return view('fornecedores', $data);
    }

    public function getEditfornecedor($id = null)
    {
        if ($id === null) {
            return redirect()->to('/fornecedores')->with('toast', [
                'type' => 'error',
                'message' => 'Fornecedor não encontrado.'
            ]);
        }

        $data['fornecedor'] = $this->fornecedorModel->find($id);
        
        if ($data['fornecedor'] === null) {
            return redirect()->to('/fornecedores')->with('toast', [
                'type' => 'error',
                'message' => 'Fornecedor não encontrado.'
            ]);
        }

        return view('editfornecedor', $data);
    }

    public function updateFornecedor($id = null)
    {
        if ($id === null) {
            return redirect()->to('/fornecedores')->with('toast', [
                'type' => 'error',
                'message' => 'Fornecedor não encontrado.'
            ]);
        }

        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'status' => $this->request->getPost('status') ? 1 : 0
        ];

        if ($this->fornecedorModel->update($id, $data)) {
            return redirect()->to('/fornecedores')->with('toast', [
                'type' => 'success',
                'message' => 'Fornecedor atualizado com sucesso!'
            ]);
        }

        return redirect()->back()->with('toast', [
            'type' => 'error',
            'message' => 'Erro ao atualizar fornecedor.'
        ])->withInput();
    }

    public function deleteFornecedor($id = null)
    {
        if ($id === null) {
            return redirect()->to('/fornecedores')->with('toast', [
                'type' => 'error',
                'message' => 'Fornecedor não encontrado.'
            ]);
        }

        if ($this->fornecedorModel->delete($id)) {
            return redirect()->to('/fornecedores')->with('toast', [
                'type' => 'success',
                'message' => 'Fornecedor excluído com sucesso!'
            ]);
        }

        return redirect()->to('/fornecedores')->with('toast', [
            'type' => 'error',
            'message' => 'Erro ao excluir fornecedor.'
        ]);
    }

    public function addFornecedor()
    {
        return view('addfornecedor');
    }

    public function createFornecedor()
    {
        $data = [
            'nome' => $this->request->getPost('nome'),
            'email' => $this->request->getPost('email'),
            'telefone' => $this->request->getPost('telefone'),
            'status' => $this->request->getPost('status') ? 1 : 0
        ];

        if ($this->fornecedorModel->insert($data)) {
            return redirect()->to('/fornecedores')->with('toast', [
                'type' => 'success',
                'message' => 'Fornecedor cadastrado com sucesso!'
            ]);
        }

        return redirect()->back()->with('toast', [
            'type' => 'error',
            'message' => 'Erro ao cadastrar fornecedor.'
        ])->withInput();
    }
} 