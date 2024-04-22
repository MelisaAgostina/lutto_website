<?php

namespace App\Controllers;

use CodeIgniter\Controller;
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

   public function productos() {

      echo view('front/header');
      echo view('front/productos');
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

   public function iniciarSesion() {

      echo view('front/header');
      echo view('front/iniciarSesion');
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

   public function registrarse() {

      echo view('front/header');
      echo view('front/registrarse');
      echo view('front/footer');

   }
}
