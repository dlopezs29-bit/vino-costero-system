<?php

namespace App\Models;
use CodeIgniter\Model;

class CosechaModel extends Model
{
    protected $table = 'cosechas';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_parcela',
        'id_tipo_uva',
        'fecha_cosecha',
        'cantidad_kg',
        'id_estado_sanitario',
        'observaciones'
    ];
    protected $useTimestamps = false;
}