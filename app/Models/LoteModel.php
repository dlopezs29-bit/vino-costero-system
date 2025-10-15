<?php

namespace App\Models;
use CodeIgniter\Model;

class LoteModel extends Model
{
    protected $table = 'lotes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_cosecha',
        'codigo_lote',
        'cantidad_botellas',
        'volumen_litros',
        'estado'
    ];
    protected $useTimestamps = false;
}
