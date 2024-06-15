<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\productos_model;

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
            'productos' => $model->paginate(2),
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

    public function compras() {
        // Devolver una vista donde muestres links con cada categoría
        // URNAS -> catalogo/1
        // Joyas -> catalogo/2
        // ...

        $model = new ventas_model();

        $data = [
            'ventas' => $model->paginate(5),
            'pager' => $model->pager,
        ];

        echo view('front/header');
        echo view('front/listaCompras', $data);
        echo view('front/footer');
    }
}
