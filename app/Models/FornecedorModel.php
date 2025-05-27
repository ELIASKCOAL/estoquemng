<?php

namespace App\Models;

use CodeIgniter\Model;

class FornecedorModel extends Model
{
    protected $table = 'fornecedores';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nome', 'email', 'telefone', 'status'];

    // Validation
    protected $validationRules = [
        'nome' => 'required|min_length[3]|max_length[100]',
        'email' => 'required|valid_email|max_length[100]',
        'telefone' => 'required|min_length[10]|max_length[15]',
        'status' => 'required|in_list[0,1]'
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo Nome é obrigatório',
            'min_length' => 'O Nome deve ter no mínimo 3 caracteres',
            'max_length' => 'O Nome deve ter no máximo 100 caracteres'
        ],
        'email' => [
            'required' => 'O campo Email é obrigatório',
            'valid_email' => 'Por favor, insira um email válido',
            'max_length' => 'O Email deve ter no máximo 100 caracteres'
        ],
        'telefone' => [
            'required' => 'O campo Telefone é obrigatório',
            'min_length' => 'O Telefone deve ter no mínimo 10 caracteres',
            'max_length' => 'O Telefone deve ter no máximo 15 caracteres'
        ],
        'status' => [
            'required' => 'O campo Status é obrigatório',
            'in_list' => 'O Status deve ser Ativo ou Inativo'
        ]
    ];

    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['setDefaultStatus'];
    protected $beforeUpdate = ['setDefaultStatus'];

    protected function setDefaultStatus(array $data)
    {
        if (!isset($data['data']['status'])) {
            $data['data']['status'] = 1; // Define status como ativo por padrão
        }
        return $data;
    }
} 