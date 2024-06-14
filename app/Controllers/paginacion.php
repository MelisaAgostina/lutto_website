<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\productos_model;

class Paginacion extends BaseController
{
    public function paginar()
    {
        $model = new productos_model();

        $data = [
            'productos' => $model->paginate(5),
            'pager' => $model->pager,
        ];

        echo view('front/header');
        echo view('productos/productos_v', $data);
        echo view('front/footer');
    }
}
