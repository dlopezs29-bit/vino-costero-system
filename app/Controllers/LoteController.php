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
        $validation->setRules([
            'id_cosecha' => 'required|integer',
            'codigo_lote' => 'required|min_length[3]|max_length[50]|is_unique[lotes.codigo_lote]',
            'cantidad_botellas' => 'required|integer',
            'volumen_litros' => 'required|decimal',
            'estado' => 'required|in_list[en_proceso,embotellado,almacenado]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

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
