<?php

namespace App\Controllers;

use App\Models\FornecedorModel;

class Fornecedores extends BaseController
{
    public function index()
    {
        $model = new FornecedorModel();
        $data['fornecedores'] = $model->findAll();
        return view('fornecedores', $data);
    }

    public function delete($id = null)
    {
        if (!$id) {
            return redirect()->to(base_url('fornecedores'))->with('error', 'ID do fornecedor não fornecido');
        }

        $model = new FornecedorModel();
        
        if ($model->delete($id)) {
            session()->setFlashdata('toast', [
                'type' => 'success',
                'message' => 'Fornecedor excluído com sucesso!'
            ]);
            return redirect()->to(base_url('fornecedores'));
        } else {
            session()->setFlashdata('toast', [
                'type' => 'error',
                'message' => 'Erro ao excluir fornecedor'
            ]);
            return redirect()->to(base_url('fornecedores'));
        }
    }
}
