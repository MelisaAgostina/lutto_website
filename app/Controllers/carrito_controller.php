<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\productos_model;

class Carrito_controller extends BaseController {

    protected $cart;

    public function __construct() {
        helper(['form', 'url']);
        $this->cart = \Config\Services::cart();
    }

    public function catalogo($categoria_id = 1) { // Asume categoría por defecto si no se pasa
        $productos = new productos_model();
        $data['producto'] = $productos->orderBy('id', 'ASC')->findAll();

        echo view('front/header');
        
        // Retorna según la categoría
        switch($categoria_id) {
            case 1:
                echo view('productos/urnas', $data);
                break;
            case 2:
                echo view('productos/fotografia', $data);
                break;
            case 3:
                echo view('productos/joyeria', $data);
                break;
            default:
                echo view('productos/productos_v', $data); // Vista general si la categoría no coincide
        }

        echo view('front/footer');
    }

    public function add() {
            $request = \Config\Services::request();
            $data = array(
                'id'      => $request->getPost('id'),
                'qty'     => $request->getPost('qty'),
                'price'   => $request->getPost('price'),
                'name'    => $request->getPost('name'),
            );
        
            $this->cart->insert($data);
        
            return redirect()->to('carrito/view');
    }

    public function remove($rowid) {
        if($rowid === "all") {
            $this->cart->destroy();
        } else {
            $this->cart->remove($rowid);
        }

        return redirect()->back()->withInput();
    }

    public function view() {  // Ver carrito 
        //$data['cart'] = $this->cart->contents(); en lugar de leer la informacion desde el carrito, obtenemos la informacion de cada producto desde la base de datos

        $carrito = $this->cart->contents();
        $model = new productos_model();
        $productos = [];

        foreach($carrito as $item){
            $producto = $model->find($item['id']);
            $producto['qty'] = $item['qty'];
            $producto['rowid'] = $item['rowid'];
            $productos[] = $producto;
        }
        $data['productos']= $productos;

        echo view('front/header');
        echo view('front/carrito', $data);
        echo view('front/footer');
    }

    public function checkout() { // Registrar la compra y redirigir a vista checkout, controlar
        $session = session();
        $cart = $this->cart->contents();

        $carrito = $this->cart->contents();
        $model = new productos_model();
        $productos = [];

        foreach($carrito as $item){
            $producto = $model->find($item['id']);
            $producto['qty'] = $item['qty'];
            $producto['rowid'] = $item['rowid'];
            $productos[] = $producto;
        }
        $data['productos']= $productos;

        $ventasModel = new \App\Models\ventas_model();
        $ventaId = $ventasModel->insert([
             'fecha' => date('Y-m-d H:i:s'),
             'usuario_id' => $session->get('id_usuario'),
             'total_venta' => $this->cart->total(),
        ]);

        foreach ($productos as $item) {
            $ventasDetalleModel = new \App\Models\ventasDetalle_model();

            $ventasDetalleModel->insert([
            'venta' => $ventaId,
            'producto' => $item['id'],
            'cantidad' => $item['qty'],
            'precio' => $item['precio_vta'],
            ]);
        }

        // Vaciar el carrito después de la compra
        $this->cart->destroy();
        return redirect()->to('carrito/view'); //cambair para que redirija a la vista de checkout
    }

    // Función para vaciar el carrito
    public function vaciar() {
        $this->cart->destroy();
        return redirect()->to('carrito/view');
    }

    // Función para actualizar el carrito
    public function actualizar() {
        $request = \Config\Services::request();
        $cartData = $request->getPost('cart');

        foreach ($cartData as $item) {
            $data = array(
                'rowid' => $item['rowid'],
                'qty'   => $item['qty'],
            );
            $this->cart->update($data);
        }

        return redirect()->to('carrito/view');
    }
}
