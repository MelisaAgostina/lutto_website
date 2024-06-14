<?php
namespace App\Models;
use CodeIgniter\Model;

class productos_model extends Model{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $allowedFields = ['categoria_id', 'nombre', 'descripcion', 'precio', 'precio_vta', 'stock', 'stock_min', 'imagen', 'activo'];
    // Configuración de paginación
    protected $perPage = 5;
    
    public function marcarComoBaja($id) {
        return $this->update($id, ['activo' => 'NO']);
    }
    public function getCantidad($id)
    {
        $producto = $this->find($id);
        return $producto['stock'];
    }

    public function updateCantidad($id, $nueva_cantidad)
    {
        $data = ['stock' => $nueva_cantidad];
        $this->update($id, $data);
    }
}
