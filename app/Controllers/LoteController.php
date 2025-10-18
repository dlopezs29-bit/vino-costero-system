<?php

namespace App\Controllers;
use App\Models\LoteModel;
use App\Models\CosechaModel;
use CodeIgniter\Controller;

class LoteController extends Controller
{
    public function index()
    {
        $model = new LoteModel();

        // Relaciona con cosechas para mostrar información contextual
        $data['lotes'] = $model
            ->select('lotes.*, cosechas.fecha_cosecha, cosechas.cantidad_kg')
            ->join('cosechas', 'cosechas.id = lotes.id_cosecha')
            ->orderBy('lotes.id', 'DESC')
            ->findAll();

        return view('lotes/index', $data);
    }

    public function create()
    {
        $cosechaModel = new CosechaModel();
        $data['cosechas'] = $cosechaModel->findAll();

        return view('lotes/create', $data);
    }

    public function store()
    {
        $model = new LoteModel();
        $validation = \Config\Services::validation();

        // ✅ Reglas con verificación de litros mayores que 0
        $validation->setRules([
            'id_cosecha' => [
                'label' => 'Cosecha',
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Debe seleccionar una cosecha.'
                ]
            ],
            'codigo_lote' => [
                'label' => 'Código de lote',
                'rules' => 'required|min_length[3]|max_length[50]|is_unique[lotes.codigo_lote]',
                'errors' => [
                    'required' => 'Debe ingresar un código de lote.',
                    'is_unique' => 'El código ingresado ya existe.'
                ]
            ],
            'cantidad_botellas' => [
                'label' => 'Cantidad de botellas',
                'rules' => 'required|integer|greater_than[0]',
                'errors' => [
                    'required' => 'Debe ingresar la cantidad de botellas.',
                    'greater_than' => 'La cantidad de botellas debe ser mayor que cero.'
                ]
            ],
            'volumen_litros' => [
                'label' => 'Volumen (litros)',
                'rules' => 'required|decimal|greater_than[0]',
                'errors' => [
                    'required' => 'Debe ingresar el volumen en litros.',
                    'decimal' => 'El volumen debe ser un número válido.',
                    'greater_than' => 'El volumen debe ser mayor que cero.'
                ]
            ],
            'estado' => [
                'label' => 'Estado',
                'rules' => 'required|in_list[en_proceso,embotellado,almacenado]',
                'errors' => [
                    'required' => 'Debe seleccionar un estado válido.'
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
            'id_cosecha' => $this->request->getPost('id_cosecha'),
            'codigo_lote' => $this->request->getPost('codigo_lote'),
            'cantidad_botellas' => $this->request->getPost('cantidad_botellas'),
            'volumen_litros' => $this->request->getPost('volumen_litros'),
            'estado' => $this->request->getPost('estado'),
        ]);

        return redirect()->to('/lotes')->with('success', 'Lote registrado correctamente.');
    }
}