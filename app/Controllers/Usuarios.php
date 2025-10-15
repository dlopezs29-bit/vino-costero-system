<?php
namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Usuarios extends BaseController
{
    public function crear()
    {
        return view('crearUsuario');
    }

    public function guardar()
    {
        $model = new UsuarioModel();

        // Validar que el email no exista
        $email = $this->request->getPost('email');
        if ($model->buscarPorEmail($email)) {
            return redirect()->back()->with('error', 'El correo ya está registrado.');
        }

        // Crear el usuario con hash de contraseña
        $model->insert([
            'id_rol' => $this->request->getPost('id_rol'),
            'nombre' => $this->request->getPost('nombre'),
            'email' => $email,
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to(base_url('usuarios/crear'))->with('success', 'Usuario creado correctamente.');
    }
}
