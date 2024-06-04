<?php
namespace App\Models;
use CodeIgniter\Model;

class ventasDetalle_model extends Model{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['venta', 'producto', 'cantidad', 'precio'];
}