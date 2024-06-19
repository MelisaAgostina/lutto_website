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

    public function save()
    {
        $validation = \Config\Services::validation();
    
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'mensaje' => $this->request->getPost('mensaje')
        ];
    
        // Configurar las reglas de validación
        $validation->setRules([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|valid_email',
            'mensaje' => 'required'
        ]);
    
        // Validar los datos
        if (!$validation->withRequest($this->request)->run()) {
            // Establecer mensaje de error en la sesión con los mensajes de validación
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/contacto')->withInput();
        }
    
        $model = new consultas_model();
        
        if ($model->save($data)) {
            // Establecer mensaje de éxito en la sesión
            session()->setFlashdata('success', 'Consulta envíada exitosamente.');
        } else {
            // Establecer mensaje de error en la sesión
            session()->setFlashdata('error', 'Hubo un problema al envíar la consulta.');
        }
    
        return redirect()->to('/contacto');
    }
    


    public function saveP(){

        $validation = \Config\Services::validation();
    
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'producto' => $this->request->getPost('producto'),
            'mensaje' => $this->request->getPost('mensaje')
        ];
    
        // Configurar las reglas de validación
        $validation->setRules([
            'nombre' => 'required',
            'producto' => 'required',
            'mensaje' => 'required'
        ]);
    
        // Validar los datos
        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->back()->withInput();
        }
    
        $model = new consultasProd_model();
        
        if ($model->save($data)) {
            // Establecer mensaje de éxito en la sesión
            session()->setFlashdata('success', 'Consulta envíada exitosamente.');
        } else {
            // Establecer mensaje de error en la sesión
            session()->setFlashdata('error', 'Hubo un problema al envíar la consulta.');
        }
    
        return redirect()->back();
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