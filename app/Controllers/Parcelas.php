<?php
namespace App\Controllers;

use App\Models\ParcelaModel;

class Parcelas extends BaseController
{
    public function index()
    {
        $model = new ParcelaModel();
        $data['parcelas'] = $model->findAll();

        return view('parcelas/index', $data);
    }

    public function crear()
    {
        // Muestra la vista con un posible mensaje de error
        return view('parcelas/crear');
    }

    public function guardar()
    {
        $model = new ParcelaModel();
        $nombre = $this->request->getPost('nombre');

        // Verificar si el nombre ya existe
        $existe = $model->where('nombre', $nombre)->first();

        if ($existe) {
            // Si el nombre ya existe, vuelve a la vista con un mensaje de error
            return view('parcelas/crear', [
                'error' => 'El nombre de la parcela ya está registrado. Por favor, elige otro.'
            ]);
        }

        // Si no existe, se guarda normalmente
        $model->insert([
            'nombre' => $nombre,
            'ubicacion' => $this->request->getPost('ubicacion'),
            'area' => $this->request->getPost('area'),
            'id_uva' => $this->request->getPost('id_uva'),
            'id_estado_sanitario' => $this->request->getPost('id_estado_sanitario'),
        ]);

        return redirect()->to(base_url('parcelas'));
    }

    public function editar($id)
    {
        $model = new ParcelaModel();
        $data['parcela'] = $model->find($id);

        return view('parcelas/editar', $data);
    }

    public function actualizar($id)
    {
        $model = new ParcelaModel();
        $model->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'ubicacion' => $this->request->getPost('ubicacion'),
            'area' => $this->request->getPost('area'),
        ]);

        return redirect()->to(base_url('parcelas'));
    }

    public function eliminar($id)
    {
        $model = new ParcelaModel();
        $model->delete($id);

        return redirect()->to(base_url('parcelas'));
    }
}
