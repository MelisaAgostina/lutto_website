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
        return view('usuarios/crud', $data);
        
    }

    public function create()
    {
        // Cargar vista para crear un nuevo usuario
        return view('usuarios/addNew');
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
            'baja' => 0
        ];


    $model = new Usuarios_model();
    $model->insert($data);
    return redirect()->to(base_url('usuarios'))->with('success', 'Usuario creado exitosamente.');

        // Instancia del modelo de usuarios
        $model = new usuarios_model();

        // Insertar nuevo usuario
        $model->insert($data);

        // Redireccionar a la lista de usuarios
        return redirect()->to(base_url('usuarios'));
    }

    public function edit($id)
    {
        // Instancia del modelo de usuarios
        $model = new usuarios_model();

        // Obtener usuario por ID
        $data['usuario'] = $model->find($id);

        // Cargar vista para editar usuario
        return view('usuarios/edit', $data);
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
            'pass' => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
            'perfil_id' => 1,
            'logged_in' => 0,
            'baja' => 0
        ];

        // Instancia del modelo de usuarios
        $model = new usuarios_model();

        // Actualizar usuario
        $model->update($id, $data);

        // Redireccionar a la lista de usuarios
        return redirect()->to(base_url('usuarios'));
    }

    public function delete($id)
    {
        // Instancia del modelo de usuarios
        $model = new usuarios_model();
    
        // Eliminar usuario
        $model->delete($id);
    
        // Redireccionar a la lista de usuarios con mensaje de éxito
        return redirect()->to(base_url('usuarios'))->with('success', 'Usuario eliminado exitosamente.');
    }
    
    }

