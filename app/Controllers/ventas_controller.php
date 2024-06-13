<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\usuarios_model;
use App\Models\ventas_model;
use App\Models\tipo_pago;

class ventas_controller extends BaseController{

    public function index()
    {
        $ventas = new ventas_model();
        $datos['ventas'] = $ventas->orderBy('id', 'ASC')->findAll();

        $usuario = new usuarios_model();
        $tipoPago = new tipo_pago();

        foreach ($datos['ventas'] as &$venta) {
            $email = $usuario->find($venta['usuario_id']);
            $venta['userEmail'] = $email['email'];

            $pago = $tipoPago->find($venta['tipoPago_id']);
            $venta['tipoPago_descripcion'] = $pago['descripcion'];
        }

        echo view('front/header');
        echo view('front/listaCompras', $datos);
        echo view('front/footer');
    }

    public function ventasUser($id)
    {
        $ventas = new ventas_model();
        $datos['ventas'] = $ventas->orderBy('id', 'ASC')->findAll();

        $usuario = new usuarios_model();
        $tipoPago = new tipo_pago();


        foreach ($datos['ventas'] as &$venta) {
            $email = $usuario->find($venta['usuario_id']);
            $venta['userEmail'] = $email['email'];

            $pago = $tipoPago->find($venta['tipoPago_id']);
            $venta['tipoPago_descripcion'] = $pago['descripcion'];
        }

        echo view('front/header');
        echo view('front/listaCompras', $datos);
        echo view('front/footer');
    }
}
?>