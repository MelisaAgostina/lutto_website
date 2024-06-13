<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuarios_model;

class usuarios_controller extends Controller
{
    public function index()
    {
        // Instancia del modelo de usuarios
        $model = new usuarios_model();

        // Obtener todos los usuarios
        $data['usuarios'] = $model->findAll();

        // Cargar vista con los datos de los usuarios
        echo view ('front/header');
        echo view ('usuarios/index', $data);
        echo view ('front/footer');
    }

    public function create()
    {
        // Cargar vista para crear un nuevo usuario
        echo view ('front/header');
        echo view ('usuarios/addNew');
        echo view ('front/footer');
    }

    public function store()
    {
        // Obtener datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'domicilio' => $this->request->getPost('domicilio'),
            'postal' => $this->request->getPost('postal'),
            'telefono' => $this->request->getPost('telefono'),
            'pass' => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
            'perfil_id' => 1,
            'logged_in' => 0,
            'baja' => 'NO',
        ];

         $model = new Usuarios_model();
         $model->insert($data);
         return redirect()->to(base_url('usuarios'))->with('success', 'Usuario creado exitosamente.');

         //Instancia del modelo de usuarios
         $model = new usuarios_model();

         //Insertar nuevo usuario
         $model->insert($data);

         //Redireccionar a la lista de usuarios
         return redirect()->to(base_url('usuarios'));
    }

    public function edit($id)
    {
        //Instancia del modelo de usuarios
        $model = new usuarios_model();

        //Obtener usuario por ID
        $data['usuario'] = $model->find($id);

        //Cargar vista para editar usuario
        echo view ('front/header');
        echo view ('usuarios/edit', $data);
        echo view ('front/footer');
    }

    public function update($id)
    {
        // Obtener datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'domicilio' => $this->request->getPost('domicilio'),
            'postal' => $this->request->getPost('postal'),
            'telefono' => $this->request->getPost('telefono'),
        ];

        // Revisar si el campo para reactivar usuario está presente y marcado
        if ($this->request->getPost('baja') === 'SÍ') {
            $data['baja'] = 'NO';
        }

        //Instancia del modelo de usuarios
        $model = new usuarios_model();

        //Actualizar usuario
        $model->update($id, $data);

        //Redireccionar a la lista de usuarios
        return redirect()->to(base_url('usuarios'));
    }

    public function editP($id)
    {
        //Instancia del modelo de usuarios
        $model = new usuarios_model();

        //Obtener usuario por ID
        $data['usuario'] = $model->find($id);

        //Cargar vista para editar usuario
        echo view ('front/header');
        echo view ('usuarios/misDatos', $data);
        echo view ('front/footer');
    }

    public function updateP($id)
    {
        // Obtener datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'domicilio' => $this->request->getPost('domicilio'),
            'postal' => $this->request->getPost('postal'),
            'telefono' => $this->request->getPost('telefono'),
        ];

        //Instancia del modelo de usuarios
        $model = new usuarios_model();

        //Actualizar usuario
        $model->update($id, $data);

        //Redireccionar a la lista de usuarios
        return redirect()->to(base_url('/'));
    }


    public function delete($id)
    {
        // Instancia del modelo de usuarios
        $model = new usuarios_model();
        
        // Marcar usuario como "de baja"
        $model->marcarComoBaja($id);

        // Redireccionar a la lista de usuarios con mensaje de éxito
        return redirect()->to(base_url('usuarios'))->with('success', 'Usuario marcado como de baja exitosamente.');

    }
    
 }

