<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Products;
class Product extends Controller{
    public function index(){
        return view('Products/listar');
    }
}
