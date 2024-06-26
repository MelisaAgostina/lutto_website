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
        // Validar los datos del formulario
        $validation = \Config\Services::validation();
    
        $validation->setRules([
            'categoria_id' => 'required',
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|decimal',
            'precio_vta' => 'required|decimal',
            'stock' => 'required|integer',
            'stock_min' => 'required|integer',
            'imagen' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,1024]'
        ]);
    
        if (!$this->validate($validation->getRules())) {
            // Si la validación falla, redirigir con errores
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->back()->withInput();
        }
    
        // Obtener datos del formulario
        $image = $this->request->getFile('imagen');
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $imageName);
        } else {
            // Manejo de errores si el archivo no es válido
            session()->setFlashdata('error', 'Error al subir la imagen.');
            return redirect()->back()->withInput();
        }
    
        $data = [
            'categoria_id' => $this->request->getPost('categoria_id'),
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'precio_vta' => $this->request->getPost('precio_vta'),
            'stock' => $this->request->getPost('stock'),
            'stock_min' => $this->request->getPost('stock_min'),
            'imagen' => $imageName,
        ];
    
        // Instancia del modelo de productos
        $model = new productos_model();
    
        // Insertar nuevo producto
        if ($model->insert($data)) {
            session()->setFlashdata('success', 'Producto creado exitosamente.');
        } else {
            session()->setFlashdata('error', 'Error al crear el producto.');
        }
    
        // Redireccionar a la lista de productos
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
        // Instancia del modelo de productos
        $model = new productos_model();
    
        // Obtener datos del producto actual
        $producto_actual = $model->find($id);
    
         // Validar los datos del formulario
         $validation = \Config\Services::validation();
    
         $validation->setRules([
             'nombre' => 'required',
             'descripcion' => 'required',
         ]);
     
         if (!$this->validate($validation->getRules())) {
             // Si la validación falla, redirigir con errores
             session()->setFlashdata('error', 'El nombre y la descripción son obligatorios.');
             return redirect()->back()->withInput();
         }

        // Obtener datos del formulario
        $image = $this->request->getFile('imagen');
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(ROOTPATH . 'public/uploads', $imageName);
        } else {
            $imageName = $producto_actual['imagen']; // Mantener la imagen actual si no se subió una nueva
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
    
        // Revisar si el campo para reactivar producto está presente y marcado
        if ($this->request->getPost('activo') === 'NO') {
            $data['activo'] = 'SI';
        }
    
        // Actualizar producto
        $model->update($id, $data);
    
        session()->setFlashdata('success', 'Los cambios se guardaron correctamente.');


        // Redireccionar a la lista de productos
        return redirect()->to(base_url('productos'));
    }
    

    public function delete($id)
    {

        // Obtener la instancia de la sesión
        $session = session();
    
        // Instancia del modelo de usuarios
        $model = new productos_model();
        
        // Marcar usuario como "de baja"
        $model->marcarComoBaja($id);

        $session->setFlashdata('success', 'Producto dado de baja exitosamente.');

        // Redireccionar a la lista de usuarios con mensaje de éxito
        return redirect()->to(base_url('productos'));

    }
    
 }