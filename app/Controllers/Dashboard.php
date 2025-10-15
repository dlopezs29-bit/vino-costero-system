<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Si no hay sesión, redirige al login
        if (!session()->get('usuario_id')) {
            return redirect()->to(base_url('login'));
        }

        $data = [
            'usuario_nombre' => session()->get('usuario_nombre'),
            'usuario_rol' => session()->get('usuario_rol')
        ];

        return view('dashboard', $data);
    }
}
