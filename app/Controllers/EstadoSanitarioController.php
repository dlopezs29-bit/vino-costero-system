<?php

namespace App\Controllers;
use App\Models\EstadoSanitarioModel;
use App\Models\ParcelaModel;
use CodeIgniter\Controller;

class EstadoSanitarioController extends Controller
{
    public function index()
    {
        $model = new EstadoSanitarioModel();
        $data['estados'] = $model
            ->select('estado_sanitario.*, parcelas.nombre AS parcela')
            ->join('parcelas', 'parcelas.id = estado_sanitario.parcela_id')
            ->orderBy('fecha', 'DESC')
            ->findAll();

        return view('estadoSanitario/index', $data);
    }

    public function create()
    {
        $parcelaModel = new ParcelaModel();
        $data['parcelas'] = $parcelaModel->findAll();

        return view('estadoSanitario/create', $data);
    }

    public function store()
    {
        $model = new EstadoSanitarioModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'parcela_id' => 'required|integer',
            'fecha' => 'required|valid_date',
            'estado' => 'required|in_list[Sano,Plaga,Tratamiento]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $validation->getErrors());
        }

        $model->save([
            'parcela_id' => $this->request->getPost('parcela_id'),
            'fecha' => $this->request->getPost('fecha'),
            'estado' => $this->request->getPost('estado'),
            'observaciones' => $this->request->getPost('observaciones'),
        ]);

        return redirect()->to('estadoSanitario')->with('success', 'Estado sanitario registrado correctamente.');
    }
}
