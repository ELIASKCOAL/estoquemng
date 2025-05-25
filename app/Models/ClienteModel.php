<?php

namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table = 'clientes';         // nome da tabela no banco
    protected $primaryKey = 'id';          // chave primária da tabela (ajuste se for outro nome)
    protected $allowedFields = ['nome', 'email', 'telefone']; // campos que podem ser inseridos/atualizados (ajuste conforme suas colunas)
    
    // Se quiser, defina timestamp:
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
}
