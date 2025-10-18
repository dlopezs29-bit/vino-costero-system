<?php

namespace App\Controllers;
use App\Models\ReporteModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;

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

        // ✅ Validación de fechas
        if (empty($fechaInicio) || empty($fechaFin)) {
            return redirect()->back()
                ->with('errors', ['Debe seleccionar ambas fechas para generar el reporte.']);
        }

        if ($fechaFin < $fechaInicio) {
            return redirect()->back()
                ->with('errors', ['La fecha final no puede ser anterior a la fecha inicial.']);
        }

        $model = new ReporteModel();
        $datos = $model->obtenerDatosPorFechas($fechaInicio, $fechaFin);

        // ✅ Validación de existencia de datos
        if (empty($datos)) {
            return redirect()->back()
                ->with('errors', ['No se encontraron datos de cosechas en el rango seleccionado.']);
        }

        // ✅ Si hay datos, mostrar el gráfico comparativo mensual
        return view('reportes/resultado', [
            'datos' => $datos,
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin
        ]);
    }

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
