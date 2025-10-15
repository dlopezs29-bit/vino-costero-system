<?php

namespace App\Controllers;
use App\Models\ReporteModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf; // Para generar PDF

class ReporteController extends Controller
{
    public function index()
    {
        return view('reportes/index');
    }

    public function generar()
    {
        $fechaInicio = $this->request->getPost('fecha_inicio');
        $fechaFin = $this->request->getPost('fecha_fin');

        $model = new ReporteModel();
        $datos = $model->obtenerDatosPorFechas($fechaInicio, $fechaFin);

        return view('reportes/resultado', [
            'datos' => $datos,
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin
        ]);
    }

    // --- OPCIONAL: Generar PDF del reporte ---
    public function pdf($inicio, $fin)
    {
        $model = new ReporteModel();
        $datos = $model->obtenerDatosPorFechas($inicio, $fin);

        $html = view('reportes/pdf', [
            'datos' => $datos,
            'fechaInicio' => $inicio,
            'fechaFin' => $fin
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("reporte_cosechas.pdf", ["Attachment" => true]);
    }
}
