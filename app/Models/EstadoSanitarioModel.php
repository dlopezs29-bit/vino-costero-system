<?php

namespace App\Models;
use CodeIgniter\Model;

class EstadoSanitarioModel extends Model
{
    protected $table = 'estado_sanitario';
    protected $primaryKey = 'id';
    protected $allowedFields = ['parcela_id', 'fecha', 'estado', 'observaciones'];
    protected $useTimestamps = false;
}
