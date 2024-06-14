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

    // public function catalogo($categoria_id = 1) { // Asume categoría por defecto si no se pasa
    //     $productos = new productos_model();
    //     $data['productos'] = $productos->findAll();

    //     echo view('front/header');
        
    //     // Retorna según la categoría
    //     switch($categoria_id) {
    //         case 1:
    //             echo view('productos/urnas', $data);
    //             break;
    //         case 2:
    //             echo view('productos/fotografia', $data);
    //             break;
    //         case 3:
    //             echo view('productos/joyeria', $data);
    //             break;
    //         default:
    //             echo view('productos/productos_v', $data); // Vista general si la categoría no coincide
    //     }

    //     echo view('front/footer');
    //     // $model = new productos_model();

    //     // $data = [
    //     //     'productos' => $model->paginate(5),
    //     //     'pager' => $model->pager,
    //     // ];

    //     // echo view('front/header');
    //     // echo view('productos/productos_v', $data);
    //     // echo view('front/footer');
    // }

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
        
            return redirect()->back()->with('Ítem añadido al carrito');
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

        
        $tipoPago_id = $this->request->getPost('tipoPago_id');
        $tarjeta = $this->request->getPost('tarjeta');
        $nombre = $this->request->getPost('nombre');
        $expira = $this->request->getPost('expira');
        $cvc = $this->request->getPost('cvc');

        // Validar datos del formulario
        if (empty($tipoPago_id) || empty($tarjeta) || empty($nombre) || empty($expira) || empty($cvc)) {
        // Manejar el error aquí, por ejemplo redirigiendo a la página anterior con un mensaje de error
        return redirect()->back()->with('error', 'Todos los campos son obligatorios.');
        }


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

        $producto_id = $producto['id_producto'];
        $cantidad_actual = $model->getCantidad($producto_id);

        $nueva_cantidad = $cantidad_actual - $producto['qty'];

        $cart->destroy();

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
    
    public function verTodasLasCompras(){
    // Obtener todas las ventas
    $ventasModel = new Ventas_model();
    $ventas = $ventasModel->findAll();

      // Verificar que se obtienen las ventas
      if (empty($ventas)) {
        echo "No se encontraron ventas.";
        return;
    }

    // Obtener detalles de cada venta
    $ventasDetalleModel = new VentasDetalle_model();
    $productosModel = new Productos_model();
    $usuarioModel = new Usuarios_model();
    
    $ventasConDetalles = [];

    foreach ($ventas as $venta) {
        $detallesVenta = $ventasDetalleModel->where('venta', $venta['id'])->findAll();
        
        $productos = [];
        foreach ($detallesVenta as $detalle) {
            $producto = $productosModel->find($detalle['producto']);
            if ($producto) {
                $producto['cantidad'] = $detalle['cantidad'];
                $producto['precio'] = $detalle['precio'];
                $productos[] = $producto;
            }
        }
        
        $usuario = $usuarioModel->find($venta['usuario_id']);
        
        $ventasConDetalles[] = [
            'venta' => $venta,
            'productos' => $productos,
            'usuario' => $usuario
        ];
    }

    // Preparar datos para la vista
    $data = [
        'ventasConDetalles' => $ventasConDetalles
    ];

    // Cargar la vista de todas las compras con los datos
    echo view('front/header');
    echo view('front/listaCompras', $data);
    echo view('front/footer');
}

public function verHistorialCompras()
{
    $session = session();
    $usuarioId = $session->get('id_usuario');
    
    if (!$usuarioId) {
        return redirect()->to('login')->with('error', 'Debe iniciar sesión para acceder a su historial de compras.');
    }

    // Obtener todas las ventas del usuario
    $ventasModel = new Ventas_model();
    $ventas = $ventasModel->where('usuario_id', $usuarioId)->findAll();

    // Obtener detalles de cada venta
    $ventasDetalleModel = new VentasDetalle_model();
    $productosModel = new Productos_model();
    
    $ventasConDetalles = [];

    foreach ($ventas as $venta) {
        $detallesVenta = $ventasDetalleModel->where('venta', $venta['id'])->findAll();
        
        $productos = [];
        foreach ($detallesVenta as $detalle) {
            $producto = $productosModel->find($detalle['producto']);
            if ($producto) {
                $producto['cantidad'] = $detalle['cantidad'];
                $producto['precio'] = $detalle['precio'];
                $productos[] = $producto;
            }
        }
        
        $ventasConDetalles[] = [
            'venta' => $venta,
            'productos' => $productos,
        ];
    }

    // Preparar datos para la vista
    $data = [
        'ventasConDetalles' => $ventasConDetalles
    ];

    // Cargar la vista de historial de compras del cliente con los datos
    echo view('front/header');
    echo view('usuarios/historialCompras', $data);
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
