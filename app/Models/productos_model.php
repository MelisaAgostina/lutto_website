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
    
    public function reducirStock($id, $cantidad) {
        $producto = $this->find($id);
        if ($producto && $producto['stock'] >= $cantidad) {
            $nuevoStock = $producto['stock'] - $cantidad;
            return $this->update($id, ['stock' => $nuevoStock]);
        }
        return false; // En caso de que el stock sea insuficiente o el producto no exista
    }
}
