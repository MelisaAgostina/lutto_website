<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('index', 'Home::index');
$routes->get('acercaDe', 'Home::acercaDe');
$routes->get('contacto', 'Home::contacto');
$routes->get('productos_v', 'Home::productos_v');
$routes->get('urnas', 'Home::urnas');
$routes->get('joyeria', 'Home::joyeria');
$routes->get('fotografia', 'Home::fotografia');
$routes->get('venta', 'Home::venta');
$routes->get('privacidad', 'Home::privacidad');
$routes->get('faq', 'Home::faq');
$routes->get('login', 'Home::login');
$routes->get('terminos', 'Home::terminos');
$routes->get('registro', 'Home::registro');



//Rutas para el controlador de productos
$routes->get('productos', 'productos_controller::index', ['filter' => 'authAdmin']); // Mostrar lista de producto
$routes->get('productos/create', 'productos_controller::create', ['filter' => 'authAdmin']); // Mostrar formulario para crear producto
$routes->post('productos/store', 'productos_controller::store', ['filter' => 'authAdmin']); // Almacenar nuevo producto
$routes->get('productos/edit/(:num)', 'productos_controller::edit/$1', ['filter' => 'authAdmin']); // Mostrar formulario para editar producto
$routes->post('productos/update/(:num)', 'productos_controller::update/$1', ['filter' => 'authAdmin']); // Actualizar productos
$routes->get('productos/delete/(:num)', 'productos_controller::delete/$1', ['filter' => 'authAdmin']); // Eliminar productos

/*rutas para el manejo de usuarios*/
$routes->get('usuarios', 'usuarios_controller::index', ['filter' => 'authAdmin']); // Mostrar lista de usuarios
$routes->get('usuarios/create', 'usuarios_controller::create', ['filter' => 'authAdmin']); // Mostrar formulario para crear usuario
$routes->post('usuarios/store', 'usuarios_controller::store', ['filter' => 'authAdmin']); // Almacenar nuevo usuario
$routes->get('usuarios/edit/(:num)', 'usuarios_controller::edit/$1', ['filter' => 'authAdmin']); // Mostrar formulario para editar usuario
$routes->post('usuarios/update/(:num)', 'usuarios_controller::update/$1', ['filter' => 'authAdmin']); // Actualizar usuario
$routes->get('usuarios/delete/(:num)', 'usuarios_controller::delete/$1', ['filter' => 'authAdmin']); // Eliminar usuario

/*rutas para el manejo del carrito*/
$routes->get('catalogo/(:num)', 'carrito_controller::catalogo/$1'); // Para ver el catálogo según categoría
$routes->get('catalogo', 'carrito_controller::catalogo'); // Para ver el catálogo por defecto

$routes->post('carrito/add', 'carrito_controller::add', ['filter' => 'authUser']); // Para agregar al carrito
$routes->post('carrito/remove/(:any)', 'carrito_controller::remove/$1', ['filter' => 'authUser']); // Para remover del carrito
$routes->get('carrito/view', 'carrito_controller::view', ['filter' => 'authUser']); // Para ver el carrito
$routes->post('carrito/checkout', 'carrito_controller::checkout', ['filter' => 'authUser']); // Para realizar la compra
$routes->post('carrito/vaciar', 'carrito_controller::vaciar', ['filter' => 'authUser']); // Para vaciar el carrito
$routes->post('carrito/actualizar', 'carrito_controller::actualizar', ['filter' => 'authUser']); // Para actualizar el carrito
$routes->get('carrito/proceder', 'carrito_controller::proceder', ['filter' => 'authUser']); // carga la vista checkout

/*rutas para el inicio de sesion*/
$routes->get('/login', 'login_controller::index');
$routes->post('/login/auth', 'login_controller::auth');
$routes->get('/logout', 'login_controller::logout');

/*rutas del Registro de Usuarios*/
$routes->get('/registro','registro_controller::create');
$routes->post('/enviar-form','registro_controller::formValidation');

/*Consultas*/
$routes->get('consultas', 'consultas_controller::index', ['filter' => 'authAdmin']);
$routes->post('consultas/save', 'consultas_controller::save');
$routes->post('consultas/saveP', 'consultas_controller::saveP');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
