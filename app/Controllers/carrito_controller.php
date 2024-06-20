<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\productos_model;
use App\Models\ventasDetalle_model;
use App\Models\ventas_model;
use App\Models\usuarios_model;

class Carrito_controller extends BaseController {

    protected $cart;

    public function __construct() {
        helper(['form', 'url']);
        $this->cart = \Config\Services::cart();
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


            // Actualizar la cantidad total de ítems en el carrito
            $totalItems = $this->cart->totalItems();
            session()->set('totalItems', $totalItems);
        
            session()->setFlashdata('msg', 'Ítem añadido al carrito');
            return redirect()->back();
    }

    public function remove($rowid) {
        if($rowid === "all") {
            $this->cart->destroy();
        } else {
            $this->cart->remove($rowid);
        }

        $totalItems = 0;
        session()->set('totalItems', $totalItems) - 1;

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
    
        $validation = \Config\Services::validation();
    
        $validation->setRules([
            'tipoPago_id' => 'required',
            'tarjeta' => 'required|numeric|exact_length[16]',
            'nombre' => 'required',
            'cvc' => 'required|numeric|exact_length[3]',
        ], [
            'tipoPago_id' => [
                'required' => 'El tipo de pago es obligatorio.'
            ],
            'tarjeta' => [
                'required' => 'El número de tarjeta es obligatorio.',
                'numeric' => 'El número de tarjeta debe ser numérico.'
            ],
            'nombre' => [
                'required' => 'El nombre es obligatorio.'
            ],
            'cvc' => [
                'required' => 'El CVC es obligatorio.',
                'numeric' => 'El CVC debe ser numérico.',
                'exact_length' => 'El CVC debe tener exactamente 3 dígitos.'
            ]
        ]);
    
        if (!$this->validate($validation->getRules(), $validation->getErrors())) {
            // Manejar el error aquí, por ejemplo redirigiendo a la página anterior con un mensaje de error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $tipoPago_id = $this->request->getPost('tipoPago_id');
        $tarjeta = $this->request->getPost('tarjeta');
        $nombre = $this->request->getPost('nombre');
        $expira = $this->request->getPost('expira');
        $cvc = $this->request->getPost('cvc');
    
        // Registra la compra
        $ventasModel = new Ventas_model();
        $ventaId = $ventasModel->insert([
            'fecha' => date('Y-m-d H:i:s'),
            'usuario_id' => $session->get('id_usuario'),
            'total_venta' => $cart->total(),
            'tipoPago_id' => $tipoPago_id,
            'tarjeta' => $tarjeta,
            'nombre' => $nombre,
            'expira' => $expira,
            'cvc' => $cvc,
        ]);
    
        // Inserta detalles de la venta
        $ventasDetalle = new VentasDetalle_model();
        foreach ($productos as $item) {
            $ventasDetalle->insert([
                'venta' => $ventaId,
                'producto' => $item['id_producto'],
                'cantidad' => $item['qty'],
                'precio' => $item['precio_vta'],
            ]);
        }
    
        // Actualizar stock del producto
        $model->reducirStock($item['id_producto'], $item['qty']);
        
        $totalItems = 0;
        session()->set('totalItems', $totalItems); 
    
        $cart->destroy();
    
        // Establecer mensaje flash de éxito
        session()->setFlashdata('success', 'La compra se ha realizado correctamente.');
        return redirect()->to('carrito/vercompra');
    }
    

    public function vercompra()
    {
        $session = session();
    
        // Obtener el último ID de venta del usuario
        $ventasModel = new Ventas_model();
        $ultimaVenta = $ventasModel->where('usuario_id', $session->get('id_usuario'))
                                    ->orderBy('id', 'desc')
                                    ->first();
    
        if (!$ultimaVenta) {
            // Manejar el error si no se encuentra ninguna venta
            return redirect()->to('carrito')->with('error', 'No se encontraron compras recientes.');
        }
    
        // Obtener los detalles de la última venta
        $ventasDetalleModel = new VentasDetalle_model();
        $detallesVenta = $ventasDetalleModel->where('venta', $ultimaVenta['id'])->findAll();
    
        // Obtener información de los productos
        $productosModel = new Productos_model();
        $productos = [];
        foreach ($detallesVenta as $detalle) {
            $producto = $productosModel->find($detalle['producto']);
            if ($producto) {
                $producto['cantidad'] = $detalle['cantidad'];
                $producto['precio'] = $detalle['precio'];
                $productos[] = $producto;
            }
        }

        // Obtener información del usuario
        $usuarioModel = new Usuarios_model();
        $usuario = $usuarioModel->find($session->get('id_usuario'));
    
        // Preparar datos para la vista
        $data = [
            'venta' => $ultimaVenta,
            'productos' => $productos,
            'usuario' => $usuario
        ];
    
        // Cargar la vista de compra con los datos de la venta
        echo view('front/header');
        echo view('front/compra', $data);
        echo view('front/footer');
    }


    // Función para vaciar el carrito
    public function vaciar() {
        $totalItems = 0;
        session()->set('totalItems', $totalItems);
        $this->cart->destroy();
        return redirect()->to('carrito/view');

    }

    // Función para actualizar el carrito
    public function actualizar() {
        $this->productosModel = new productos_model();
        $request = \Config\Services::request();
        $cartData = $request->getPost('cart');

        foreach ($cartData as $item) {
            $producto = $this->productosModel->obtenerProducto($item['id_producto']);
            if ($producto) {
                if ($item['qty'] > $producto['stock']) {
                    // Establecer mensaje flash y redirigir si la cantidad deseada es mayor que el stock disponible
                    session()->setFlashdata('error', 'La cantidad deseada excede el stock disponible.');
                    return redirect()->to('carrito/view');
                } else {
                    // Actualizar la cantidad en el carrito si la cantidad es válida
                    $data = array(
                        'rowid' => $item['rowid'],
                        'qty'   => $item['qty'],
                    );
                    $this->cart->update($data);
                }
            } else {
                // Establecer mensaje flash si el producto no se encuentra
                session()->setFlashdata('error', 'El producto con ID ' . $item['id_producto'] . ' no se encuentra.');
                return redirect()->to('carrito/view');
            }
        }

        // Establecer mensaje flash de éxito si todas las cantidades se actualizaron correctamente
        session()->setFlashdata('success', 'El carrito se ha actualizado correctamente.');
        return redirect()->to('carrito/view');
    }
    
}
