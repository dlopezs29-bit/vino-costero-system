<?php

namespace App\Models;
use CodeIgniter\Model;

class ReporteModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function obtenerDatosPorFechas($fechaInicio, $fechaFin)
    {
        $query = $this->db->query("
            SELECT 
                tipos_uva.nombre AS tipo_uva,
                COUNT(cosechas.id) AS total_cosechas,
                SUM(cosechas.cantidad_kg) AS total_kg
            FROM cosechas
            INNER JOIN tipos_uva ON tipos_uva.id = cosechas.id_tipo_uva
            WHERE fecha_cosecha BETWEEN ? AND ?
            GROUP BY tipos_uva.nombre
        ", [$fechaInicio, $fechaFin]);

        return $query->getResultArray();
    }
}
