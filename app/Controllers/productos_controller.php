<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\productos_model;

class productos_controller extends Controller
{
    public function index()
    {
        // Instancia del modelo de usuarios
        $model = new productos_model();

        // Obtener todos los usuarios
        $data['productos'] = $model->findAll();

        // Cargar vista con los datos de los usuarios
        echo view ('front/header');
        echo view ('productos/indexP', $data);
        echo view ('front/footer');
    }

    

    public function create()
    {
        // Cargar vista para crear un nuevo usuario
        echo view ('front/header');
        echo view ('productos/addNewP');
        echo view ('front/footer');
    }

    public function store()
    {
            // Obtener datos del formulario
            $image = $this->request->getFile('imagen');
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move(ROOTPATH . 'public/uploads', $imageName);
            } else {
                $imageName = null; // Manejo de errores si el archivo no es válido
            }

        // Obtener datos del formulario
        $data = [
            'categoria_id' => $this->request->getPost('categoria_id'),
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'precio_vta' => $this->request->getPost('precio_vta'),
            'stock' => $this->request->getPost('stock'),
            'stock_min' => $this->request->getPost('stock_min'),
            'imagen' => $imageName,
            //'imagen' => $this->request->getPost('imagen'),
        ];

         //Instancia del modelo de usuarios
         $model = new productos_model();

         //Insertar nuevo usuario
         $model->insert($data);

         //Redireccionar a la lista de usuarios
         return redirect()->to(base_url('productos'));
    }

    public function edit($id)
    {
        //Instancia del modelo de usuarios
        $model = new productos_model();

        //Obtener usuario por ID
        $data['producto'] = $model->find($id);

        //Cargar vista para editar usuario
        echo view ('front/header');
        echo view ('productos/editP', $data);
        echo view ('front/footer');
    }

    public function update($id)
    {

        
        // Obtener datos del formulario
        $image = $this->request->getFile('imagen');
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move(ROOTPATH . 'public/uploads', $imageName);
            } else {
                $imageName = null; // Manejo de errores si el archivo no es válido
            }

        // Obtener datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'precio_vta' => $this->request->getPost('precio_vta'),
            'stock' => $this->request->getPost('stock'),
            'stock_min' => $this->request->getPost('stock_min'),
            'imagen' => $imageName,
        ];

        
        // Revisar si el campo para reactivar usuario está presente y marcado
        if ($this->request->getPost('activo') === 'NO') {
            $data['activo'] = 'SI';
        }

        //Instancia del modelo de usuarios
        $model = new productos_model();

        //Actualizar usuario
        $model->update($id, $data);

        //Redireccionar a la lista de usuarios
        return redirect()->to(base_url('productos'));
    }

    public function delete($id)
    {
        // Instancia del modelo de usuarios
        $model = new productos_model();
        
        // Marcar usuario como "de baja"
        $model->marcarComoBaja($id);

        // Redireccionar a la lista de usuarios con mensaje de éxito
        return redirect()->to(base_url('productos'))->with('success', 'Producto marcado como fuera de línea exitosamente.');

    }
    
 }