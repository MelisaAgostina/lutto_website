<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\usuarios_model;
  
class login_controller extends BaseController
{
    public function index()
    {
        helper(['form','url']);
      
        $dato['titulo']='login'; 
        echo view('front/header', $dato);
        echo view('usuarios/login');
        echo view('front/footer');


    } 
  
    public function auth(){

        $session = session(); //el objeto de sesión se asigna a la variable $session
        $model = new usuarios_model(); //instanciamos el modelo

        //traemos los datos del formulario
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('pass');
        
        $data = $model->where('username', $username)->first(); //consulta sql 

        if($data){
            
            $pass = $data['pass'];
               $ba= $data['baja'];

                if ($ba == 'SÍ'){
                     $session->setFlashdata('msg', 'Tu cuenta se encuentra desactivada, contacta al administrador.');
                     return redirect()->to('/login');
                 }
                     //Se verifican los datos ingresados para iniciar, si cumple la verificaciòn inicia la sesion
                     $verify_pass = password_verify($password, $pass);

                   //password_verify determina los requisitos de configuracion de la contraseña
                   if($verify_pass){
                    $model->update($data['id_usuario'], ['logged_in' => 1]);
                     $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido'=> $data['apellido'],
                    'email' =>  $data['email'],
                    'domicilio' =>  $data['domicilio'],
                    'postal' =>  $data['postal'],
                    'telefono' =>  $data['telefono'],
                    'username' => $data['username'],
                    'perfil_id'=> $data['perfil_id'],
                    'logged_in'  => 1
                ];

            //Si se cumple la verificacion inicia la sesiòn  
            $session->set($ses_data);

            session()->setFlashdata('msg', 'Bienvenido');
            return redirect()->to('/index'); 


            }else{  
                 //no paso la validaciòn de la password
               $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
         }  
        
        }else{
             //no paso la validaciòn del correo
             $session->setFlashdata('msg', 'No existe el usuario o es incorrecto');
             return redirect()->to('/login');
      } 
  
    
  }



  public function logout()
    {
        $session = session();

        // Obtener el ID del usuario desde la sesión
        $userId = $session->get('id_usuario');

        // Verificar si el ID del usuario está presente en la sesión
        if ($userId) {
            // Crear una instancia del modelo de usuarios
            $usuariosModel = new usuarios_model();

            // Actualizar el campo logged_in a 0 para el usuario correspondiente
            $usuariosModel->update($userId, ['logged_in' => 0]);
        }

        // Destruir la sesión
        $session->destroy();

        // Redirigir a la página principal
        return redirect()->to('/');
    }
    
} 
