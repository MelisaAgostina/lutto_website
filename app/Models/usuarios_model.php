<?php
namespace App\Models;
use CodeIgniter\Model;

class usuarios_model extends Model{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['nombre', 'apellido', 'username', 'email', 'domicilio', 'postal', 'telefono', 'pass', 'perfil_id', 'logged_in','baja'];

    // Método para marcar un usuario como "de baja"
    public function marcarComoBaja($id) {
        return $this->update($id, ['baja' => 'SÍ']);
    }
}