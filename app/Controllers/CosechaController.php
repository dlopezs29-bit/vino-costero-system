<?php

namespace App\Controllers;

use App\Models\CosechaModel;
use App\Models\ParcelaModel;
use App\Models\UvaModel;
use App\Models\EstadoSanitarioModel;
use CodeIgniter\Controller;

class CosechaController extends Controller
{
    public function index()
    {
        $model = new CosechaModel();

        $data['cosechas'] = $model
            ->select('cosechas.*, parcelas.nombre AS parcela, tipos_uva.nombre AS tipo_uva, estado_sanitario.estado AS estado')
            ->join('parcelas', 'parcelas.id = cosechas.id_parcela')
            ->join('tipos_uva', 'tipos_uva.id = cosechas.id_tipo_uva')
            ->join('estado_sanitario', 'estado_sanitario.id = cosechas.id_estado_sanitario')
            ->orderBy('fecha_cosecha', 'DESC')
            ->findAll();

        return view('cosecha/index', $data);
    }

    public function create()
    {
        $parcelaModel = new ParcelaModel();
        $uvasModel = new UvaModel();
        $estadoModel = new EstadoSanitarioModel();

        $data['parcelas'] = $parcelaModel->findAll();
        $data['uvas'] = $uvasModel->findAll();
        $data['estados'] = $estadoModel->findAll();

        return view('cosecha/create', $data);
    }

    public function store()
    {
        $model = new CosechaModel();
        $validation = \Config\Services::validation();

        // 🔍 Reglas de validación, incluyendo cantidad > 0
        $validation->setRules([
            'id_parcela' => [
                'label' => 'Parcela',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Debe seleccionar una parcela.'
                ]
            ],
            'id_tipo_uva' => [
                'label' => 'Tipo de uva',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Debe seleccionar un tipo de uva.'
                ]
            ],
            'id_estado_sanitario' => [
                'label' => 'Estado sanitario',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Debe seleccionar un estado sanitario.'
                ]
            ],
            'fecha_cosecha' => [
                'label' => 'Fecha de cosecha',
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Debe ingresar una fecha válida.'
                ]
            ],
            'cantidad_kg' => [
                'label' => 'Cantidad (kg)',
                'rules' => 'required|decimal|greater_than[0]',
                'errors' => [
                    'required' => 'Debe ingresar la cantidad cosechada.',
                    'decimal' => 'La cantidad debe ser un número válido.',
                    'greater_than' => 'La cantidad debe ser mayor que cero.'
                ]
            ],
        ]);

        // 🧠 Validar la entrada
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        // 💾 Guardar si todo es válido
        $model->save([
            'id_parcela' => $this->request->getPost('id_parcela'),
            'id_tipo_uva' => $this->request->getPost('id_tipo_uva'),
            'id_estado_sanitario' => $this->request->getPost('id_estado_sanitario'),
            'fecha_cosecha' => $this->request->getPost('fecha_cosecha'),
            'cantidad_kg' => $this->request->getPost('cantidad_kg'),
            'observaciones' => $this->request->getPost('observaciones')
        ]);

        return redirect()->to('cosechas')->with('success', 'Cosecha registrada correctamente.');
    }
}
