<?php

namespace App\Models;
use CodeIgniter\Model;

class UvaModel extends Model
{
    protected $table = 'tipos_uva';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion'];
    protected $useTimestamps = false;
}
