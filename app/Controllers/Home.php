<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\productos_model;

class Home extends BaseController
{
   public function index() {

      echo view('front/header');
      echo view('front/index');
      echo view('front/footer');
   }

   public function acercaDe() {

      echo view('front/header');
      echo view('front/acercaDe');
      echo view('front/footer');
   }

   public function productos_v() {

      // Instancia del modelo de usuarios
      $model = new productos_model();

      // Obtener todos los usuarios
      $data['productos'] = $model->findAll();

      echo view('front/header');
      echo view('productos/productos_v', $data);
      echo view('front/footer');
   }

   public function urnas() {

      // Instancia del modelo de usuarios
      $model = new productos_model();

      // Obtener todos los usuarios
      $data['productos'] = $model->findAll();

      echo view('front/header');
      echo view('productos/urnas', $data);
      echo view('front/footer');
   }
   public function joyeria() {

      $model = new productos_model();

      $data['productos'] = $model->findAll();

      echo view('front/header');
      echo view('productos/joyeria', $data);
      echo view('front/footer');
   }
   public function fotografia() {

      $model = new productos_model();

      $data['productos'] = $model->findAll();

      echo view('front/header');
      echo view('productos/fotografia', $data);
      echo view('front/footer');
   }

   public function venta() {

      echo view('front/header');
      echo view('front/venta');
      echo view('front/footer');
   }

   public function contacto() {

      echo view('front/header');
      echo view('front/contacto');
      echo view('front/footer');

   }

   public function privacidad() {

      echo view('front/header');
      echo view('front/privacidad');
      echo view('front/footer');

   }

   public function login() {

      echo view('front/header');
      echo view('usuarios/login');
      echo view('front/footer');

   }

   public function faq() {

      echo view('front/header');
      echo view('front/faq');
      echo view('front/footer');

   }

   public function terminos() {

      echo view('front/header');
      echo view('front/terminos');
      echo view('front/footer');

   }

   public function registro() {

      echo view('front/header');
      echo view('usuarios/registro');
      echo view('front/footer');

   }

}
