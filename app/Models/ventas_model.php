<?php
namespace App\Models;
use CodeIgniter\Model;

class ventas_model extends Model{
    protected $table = 'ventas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fecha', 'usuario_id', 'total_venta'];
}