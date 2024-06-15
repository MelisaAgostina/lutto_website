<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\productos_model;
use App\Models\ventas_model;
use App\Models\ventasDetalle_model;
use App\Models\usuarios_model;

class CatalogoController extends BaseController {
    public function index() {
        // Devolver una vista donde muestres links con cada categoría
        // URNAS -> catalogo/1
        // Joyas -> catalogo/2
        // ...

        $model = new productos_model();

        $data = [
            'productos' => $model->paginate(5),
            'pager' => $model->pager,
        ];

        echo view('front/header');
        echo view('productos/productos_v', $data);
        echo view('front/footer');
    }

    public function categories($categoria_id = 1) {
        $model = new productos_model();
        $data = [
            'productos' => $model->paginate(5),
            'pager' => $model->pager,
        ];
        
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
    public function verTodasLasCompras() {
        // Obtener todas las ventas con paginación
        $ventasModel = new Ventas_model();
        $ventas = $ventasModel->paginate(5); // Cambia 5 por el número de ventas que quieras por página
        $pager = $ventasModel->pager;
    
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
            'ventasConDetalles' => $ventasConDetalles,
            'pager' => $pager,
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
    
        // Obtener todas las ventas del usuario con paginación
        $ventasModel = new Ventas_model();
        $ventas = $ventasModel->where('usuario_id', $usuarioId)->paginate(5); // Cambia 5 por el número de ventas que quieras por página
        $pager = $ventasModel->pager;
    
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
            'ventasConDetalles' => $ventasConDetalles,
            'pager' => $pager,
        ];
    
        // Cargar la vista de historial de compras del cliente con los datos
        echo view('front/header');
        echo view('usuarios/historialCompras', $data);
        echo view('front/footer');
    }
    

}    
