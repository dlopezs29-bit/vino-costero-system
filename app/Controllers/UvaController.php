<?php

namespace App\Controllers;
use App\Models\UvaModel;
use CodeIgniter\Controller;

class UvaController extends Controller
{
    public function index()
    {
        $model = new UvaModel();
        $data['uvas'] = $model->findAll();

        return view('uvas/index', $data);
    }

    public function create()
    {
        return view('uvas/create');
    }

    public function store()
    {
        $model = new UvaModel();

        // Validación básica
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre' => 'required|min_length[3]|max_length[100]',
            'descripcion' => 'permit_empty|max_length[500]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $model->save([
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
        ]);

        return redirect()->to('/uvas')->with('success', 'Tipo de uva agregado correctamente.');
    }
}
