<?php
namespace App\Models;
use CodeIgniter\Model;

class consultasProd_model extends Model{
    protected $table = 'consultasprod';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'producto', 'mensaje'];
}