<?php
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    // Campos permitidos para operaciones de escritura
    protected $allowedFields = ['id_rol', 'nombre', 'email', 'password_hash'];

    public function buscarPorEmail($email)
    {
        // El método find() o first() con una condición where
        return $this->where('email', $email)->first();
    }
}