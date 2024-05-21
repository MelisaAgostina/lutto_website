<?php
namespace App\Models;
use CodeIgniter\Model;

class productos_model extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['categoria_id', 'nombre', 'precio', 'precio_vta', 'stock', 'stock_min', 'imagen', 'eliminado'];
}
