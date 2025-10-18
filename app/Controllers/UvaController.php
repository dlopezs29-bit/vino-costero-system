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
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombre' => [
                'label' => 'Nombre',
                'rules' => 'required|min_length[3]|max_length[100]|is_unique[tipos_uva.nombre]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'min_length' => 'El {field} debe tener al menos 3 caracteres.',
                    'max_length' => 'El {field} no puede tener más de 100 caracteres.',
                    'is_unique' => 'El nombre de la uva ya está registrado. Elija otro.'
                ]
            ],
            'descripcion' => [
                'label' => 'Descripción',
                'rules' => 'permit_empty|max_length[500]',
                'errors' => [
                    'max_length' => 'La {field} no puede tener más de 500 caracteres.'
                ]
            ]
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
