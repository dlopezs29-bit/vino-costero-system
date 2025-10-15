<?php
namespace App\Models;

use CodeIgniter\Model;

class ParcelaModel extends Model
{
    protected $table = 'parcelas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'ubicacion', 'area'];
}