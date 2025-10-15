<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController 
{
    public function index()
    {
        return view('login');
    }

    public function intentarLogin()
    {
        $session = session(); 
        $model = new UsuarioModel();

        $email = $this->request->getPost('user'); 
        $password = $this->request->getPost('pass');  

        $usuario = $model->buscarPorEmail($email);

        if ($usuario) {
            $password_hash = $usuario['password_hash'];

            if (password_verify($password, $password_hash)) {
                // Guardar sesión con nombres consistentes
                $datosSesion = [
                    'usuario_id'   => $usuario['id'],
                    'usuario_nombre' => $usuario['nombre'],
                    'usuario_rol'  => $usuario['id_rol'],
                    'isLoggedIn'   => true
                ];

                $session->set($datosSesion);

                // Redirigir al dashboard con base_url()
                return redirect()->to(base_url('dashboard'));
            } else {
                $session->setFlashdata('error', 'Contraseña incorrecta.');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', 'Usuario no encontrado.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login')); 
    }
}
