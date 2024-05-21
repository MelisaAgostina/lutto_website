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
      echo view('productos/productos');
      echo view('front/footer');
   }

   public function urnas() {

      echo view('front/header');
      echo view('productos/urnas');
      echo view('front/footer');
   }
   public function joyeria() {

      echo view('front/header');
      echo view('productos/joyeria');
      echo view('front/footer');
   }
   public function fotografia() {

      echo view('front/header');
      echo view('productos/fotografia');
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

   //usuarios

   public function crud() {

      echo view('front/header');
      echo view('usuarios/crud');
      echo view('front/footer');

   }

   public function addNew() {

      echo view('front/header');
      echo view('usuarios/addNew');
      echo view('front/footer');

   }

   public function delete() {

      echo view('front/header');
      echo view('usuarios/delete');
      echo view('front/footer');

   }
   public function edit() {

      echo view('front/header');
      echo view('usuarios/edit');
      echo view('front/footer');

   }

   //productos

   public function crudP() {

      echo view('front/header');
      echo view('productos/crudP');
      echo view('front/footer');

   }

   public function addNewP() {

      echo view('front/header');
      echo view('productos/addNewP');
      echo view('front/footer');

   }

   public function deleteP() {

      echo view('front/header');
      echo view('productos/deleteP');
      echo view('front/footer');

   }
   public function editP() {

      echo view('front/header');
      echo view('productos/editP');
      echo view('front/footer');

   }

}
