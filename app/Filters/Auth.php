<?php
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\usuarios_model;

class Auth implements FilterInterface{
    
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->with('msg', 'Debes iniciar sesion');
        }

        $id_usuario = $session->get('id_usuario');
        $user = new usuarios_model();
        $user = $user->find($id_usuario);

        if (!$user || $user['baja'] == 'SÍ') {
            $session->destroy();
            return redirect()->to('/login')->with('msg', 'Tu cuenta esta desactivada');
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }

}