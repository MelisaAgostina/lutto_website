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

    public function proceder()
    {

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

        echo view ('front/header');
        echo view ('front/checkout_v', $data);
        echo view ('front/footer');
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
        
            return redirect()->back();//corregir para que redireccione al catalogo donde estaba el usuario
    }

    public function remove($rowid) {
        if($rowid === "all") {
            $this->cart->destroy();
        } else {
            $this->cart->remove($rowid);
        }

        return redirect()->back()->withInput();
    }

    public function view() {  
        //En lugar de leer la informacion desde el carrito, obtenemos la informacion de cada producto desde la base de datos

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

    public function checkout()
    {
        $session = session();
        $cart = \Config\Services::cart(); 

        // Obtenemos el contenido del carrito
        $carrito = $cart->contents();
        $model = new Productos_model();
        $productos = [];

        foreach ($carrito as $item) {
            $producto = $model->find($item['id']);
            if ($producto) {
                $producto['qty'] = $item['qty'];
                $producto['rowid'] = $item['rowid'];
                $productos[] = $producto;
            }
        }

        $data['productos'] = $productos;

        // Registra la compra
        $ventasModel = new Ventas_model();
        $ventaId = $ventasModel->insert([
            'fecha' => date('Y-m-d H:i:s'),
            'usuario_id' => $session->get('id_usuario'),
            'total_venta' => $cart->total(),
        ]);

        // Inserta detalles de la venta
        $ventasDetalleModel = new VentasDetalle_model();
        foreach ($productos as $item) {
            $ventasDetalleModel->insert([
                'venta' => $ventaId,
                'producto' => $item['id'],
                'cantidad' => $item['qty'],
                'precio' => $item['precio_vta'],
            ]);
        }

        $cart->destroy();

        return redirect()->to('carrito/vercompra');
    }

    public function vercompra()
    {
        $session = session();
        $ventasModel = new Ventas_model();
        $ventasDetalleModel = new VentasDetalle_model();

        // Obtén el último registro de ventas del usuario actual
        $venta = $ventasModel->where('usuario_id', $session->get('id_usuario'))
                             ->orderBy('fecha', 'desc')
                             ->first();

        // Obtén los detalles de la venta
        $ventaDetalles = $ventasDetalleModel->where('venta', $venta['id'])
                                            ->findAll();

        // Pasa los datos a la vista
        echo view('front/header');
        echo view('front/compra', ['venta' => $venta, 'detalles' => $ventaDetalles]);
        echo view('front/footer');
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
