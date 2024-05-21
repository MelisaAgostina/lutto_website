<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\productos_model;

class productos_controller extends Controller
{
    public function index()
    {
        // Instancia del modelo de productos
        $model = new productos_model();

        // Obtener todos los productos
        $data['productos'] = $model->findAll();

        // Cargar vista con los datos de los productos
        return view('productos/crudP', $data);
        
    }

    public function create()
    {
        // Cargar vista para crear un nuevo producto
        return view('productos/addNewP');
    }

    public function store()
    {
        // Obtener datos del formulario
        $data = [
            'categoria_id' => $this->request->getPost('categoria_id'),
            'nombre' => $this->request->getPost('nombre'),
            'precio' => $this->request->getPost('precio'),
            'precio_vta' => $this->request->getPost('precio_vta'),
            'domicilio' => $this->request->getPost('domicilio'),
            'stock' => $this->request->getPost('stock'),
            'stock_min' => $this->request->getPost('stock_min'),
            'imagen' => $this->request->getPost('imagen'),
            //eliminado?
        ];


    $model = new productos_model();
    $model->insert($data);
    return redirect()->to(base_url('productos'))->with('success', 'Producto agregado exitosamente.');

        // Instancia del modelo de productos
        $model = new productos_model();

        // Insertar nuevo productos
        $model->insert($data);

        // Redireccionar a la lista de productos
        return redirect()->to(base_url('productos'));
    }

    public function edit($id)
    {
        // Instancia del modelo de productos
        $model = new productos_model();

        // Obtener productos por ID
        $data['productos'] = $model->find($id);

        // Cargar vista para editar producto
        return view('productos/editP', $data);
    }

    public function update($id)
    {
        // Obtener datos del formulario
        $data = [
            'categoria_id' => $this->request->getPost('categoria_id'),
            'nombre' => $this->request->getPost('nombre'),
            'username' => $this->request->getPost('username'),
            'precio' => $this->request->getPost('precio_vta'),
            'stock' => $this->request->getPost('stock'),
            'stock_min' => $this->request->getPost('stock_min'),
            'imagen' => $this->request->getPost('imagen'),
            //eliminado?
        ];

        // Instancia del modelo de producto
        $model = new productos_model();

        // Actualizar producto
        $model->update($id, $data);

        // Redireccionar a la lista de productos
        return redirect()->to(base_url('productos'));
    }

    public function delete($id)
    {
        // Instancia del modelo de productos
        $model = new productos_model();
    
        // Eliminar producto
        $model->delete($id);
    
        // Redireccionar a la lista de productos con mensaje de éxito
        return redirect()->to(base_url('productos'))->with('success', 'Producto eliminado exitosamente.');
    }
    
    }
