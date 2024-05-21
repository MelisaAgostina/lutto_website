<?php
namespace App\Controllers;
use App\Models\usuarios_model;
use CodeIgniter\Controller;

class registro_controller extends Controller{

    public function __construct(){

        helper(['form', 'url']);
        

    }

    public function create(){

        $dato['titulo'] = 'Registro';
        echo view ('front/header', $dato);
        echo view ('usuarios/registro');
        echo view ('front/footer');

    }

    public function formValidation(){

        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'username' => 'required|min_length[3]|is_unique[usuarios.username]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'domicilio' => 'required|min_length[4]|max_length[100]',
            'postal' => 'required|min_length[2]',
            'telefono' => 'required|min_length[4]',
            'pass' => 'required|min_length[3]|max_length[20]',
        ],);

        $userModel = new usuarios_model();

        if(!$input){

            $data['titulo'] = 'Registro';
            echo view ('front/header', $data);
            echo view ('usuarios/registro', ['validation' => $this->validator]);
            echo view ('front/footer');
        }
        else{
            
            $userModel->save([
                'nombre' => $this->request->getPost('nombre'),
                'apellido' => $this->request->getPost('apellido'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'domicilio' => $this->request->getPost('domicilio'),
                'postal' => $this->request->getPost('postal'),
                'telefono' => $this->request->getPost('telefono'),
                'perfil_id' => '2',
                'pass' => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT)
            ]);

            session()->setFlashdata('success', 'Usuario registrado con éxito');
            return $this->response->redirect('login');

        }

    }

}