<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\consultas_model;
use App\Models\consultasProd_model;

class consultas_controller extends BaseController{

    //consultas generales
    public function index(){

        $modelConsultas = new consultas_model();
        $modelConsultasProd = new consultasProd_model();

        $data['consultas'] = $modelConsultas->findAll();
        $data['consultasprod'] = $modelConsultasProd->findAll();

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


    public function saveP(){
        
        $model = new consultasProd_model();
        
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'producto' => $this->request->getPost('producto'),
            'mensaje' => $this->request->getPost('mensaje')
        ];

        if($model->save($data)){
            $data['msg'] = 'Consulta guardada exitosamente.';
        } else {
            $data['msg'] = 'Hubo un problema al guardar la consulta.';
        }

        return redirect()->back()->with('msg');
    }


public function marcar_leido($id) {
    $consultModel = new consultas_model();

    // Obtener la consulta por su ID
    $consulta = $consultModel->find($id);

    // Verificar si la consulta existe
    if ($consulta === null) {
        return redirect()->back()->with('error', 'Consulta no encontrada.');
    }

    $data = ['leido' => 0];
    $consultModel->update($id, $data);

    return redirect()->back()->with('mensaje', 'Consulta marcada como leída.');
}

public function marcar_no_leido($id) {
    $consultModel = new consultas_model();

    // Obtener la consulta por su ID
    $consulta = $consultModel->find($id);

    // Verificar si la consulta existe
    if ($consulta === null) {
        return redirect()->back()->with('error', 'Consulta no encontrada.');
    }

    $data = ['leido' => 1];
    $consultModel->update($id, $data);

    return redirect()->back()->with('mensaje', 'Consulta marcada como no leída.');
}

}