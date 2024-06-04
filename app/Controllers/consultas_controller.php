<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\consultas_model;

class consultas_controller extends BaseController{

    public function index(){

        $model = new consultas_model();

        $data['consultas'] = $model->findAll();

        echo view('front/header');
        echo view('front/consultas', $data);
        echo view('front/footer');

    }

    public function save(){
        
        $model = new consultas_model();
        
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'mensaje' => $this->request->getPost('mensaje')
        ];

        if($model->save($data)){
            $data['msg'] = 'Consulta guardada exitosamente.';
        } else {
            $data['msg'] = 'Hubo un problema al guardar la consulta.';
        }

        return redirect()->to('/contacto');
    }
}