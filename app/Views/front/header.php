<!DOCTYPE html>
<html>
    <head>  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       
        <!---css--->
        <link rel="stylesheet" href="assets/css/miestilo.css">
        <link rel="stylesheet" href="assets/css/venta.css">
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="assets/css/footer.css">
        <link rel="stylesheet" href="assets/css/acercaDe.css">
        <link rel="stylesheet" href="assets/css/contacto.css">
        <link rel="stylesheet" href="assets/css/productos.css">
        <link rel="stylesheet" href="assets/css/urnas.css">
        <link rel="stylesheet" href="assets/css/joyeria.css">
        <link rel="stylesheet" href="assets/css/fotografia.css">
        <link rel="stylesheet" href="assets/css/terminos.css">
        <link rel="stylesheet" href="assets/css/privacidad.css">
        <link rel="stylesheet" href="assets/css/faq.css">
        <link rel="stylesheet" href="assets/css/login.css">
        <link rel="stylesheet" href="assets/css/registro.css">
        <link rel="stylesheet" href="assets/css/cart.css">

        <link rel="stylesheet" href="assets/css/productos/addNewP.css">
        <link rel="stylesheet" href="assets/css/productos/editP.css">
        <link rel="stylesheet" href="assets/css/productos/deleteP.css">
        <link rel="stylesheet" href="assets/css/productos/crudP.css">
        
        <link rel="stylesheet" href="assets/css/usuarios/addNew.css">
        <link rel="stylesheet" href="assets/css/usuarios/edit.css">
        <link rel="stylesheet" href="assets/css/usuarios/delete.css">
        <link rel="stylesheet" href="assets/css/usuarios/crud.css">

        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        
        <script src="assets/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="swiper-bundle.min.css">

        <title>LUTTO</title>

        <script src="assets/js/script.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


          <link rel="shortcut icon" href="assets/img/logo4sinfondo.png" type="image/x-icon">
          <!-- Si deseas que funcione en dispositivos de Apple -->
          <link rel="apple-touch-icon" href="assets/img/logo4sinfondo.png">
          <link rel="apple-touch-icon" sizes="152x152" href="assets/img/logo4sinfondo.png">
          <link rel="apple-touch-icon" sizes="180x180" href="assets/img/logo4sinfondo.png">
          <!-- Si deseas que funcione en dispositivos Android -->
          <link rel="icon" sizes="192x192" href="assets/img/logo4sinfondo.png">
          <!-- Si deseas que funcione en dispositivos Windows -->
          <meta name="msapplication-square70x70logo" content="assets/img/logo4sinfondo.png">
          <meta name="msapplication-square150x150logo" content="assets/img/logo4sinfondo.png">
          <meta name="msapplication-wide310x150logo" content="assets/img/logo4sinfondo.png">
          <meta name="msapplication-square310x310logo" content="assets/img/logo4sinfondo.png">     

          
         <!----ESTILO PARA LA NAVBAR--->
        <style>
              /* Añade este estilo CSS en la sección <head> de tu HTML */
              .navbar-scroll-up {
                transform: translateY(0);
                transition: transform 0.3s ease-out;
              }

              .navbar-scroll-down {
                transform: translateY(-100%);
                transition: transform 0.3s ease-out;
              }
            </style>

          
          <!---ESTILO PARA EL TEXTO DEL CARRUSEL--->
          <style>
              @keyframes slideUp {
                from {
                  transform: translateY(100%);
                }
                to {
                  transform: translateY(0);
                }
              }

              .carousel-caption {
                animation: slideUp 1s ease-out;
              }
            </style>
      
    </head>

  <body>

<!---BARRA DE NAVEGACIÓN COMIENZA--->
<header>

    <!-- Creamos la var session -->
    <?php
    $session = session();
    $logged_in = $session->get('logged_in');
    $perfil_id = $session->get('perfil_id');
    ?>

<div class="navigation-container">
    <input type="checkbox" name="" id="toggler">
    <label for="toggler"><i class="fa fa-paw" aria-hidden="true"></i></label>

    <a href="#" class="logo"><img src="assets/img/logo4.png" alt="LogoLutto"></a>

    <nav class="navbar">
        <?php if($logged_in == 1): ?>
            <?php if ($perfil_id == 2): ?>
                <?php echo anchor('index', 'INICIO') ?>
                <div class="dropdown">
                    <button class="boton-usuario" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent; font-size: 1.5rem; padding: 0 1.5rem">
                        PERFIL
                    </button>
                    <ul class="dropdown-menu">
                        <p class="btn"><?php echo anchor('fotografia', 'Historial de Compras') ?></p>
                        <p class="btn"><?php echo anchor('fotografia', 'Mis datos') ?></p>
                        <p class="btn"><a href="<?= base_url('/logout') ?>">Cerrar Sesión</a></p>
                    </ul>
                </div>
                <!---boton de carrito--->
                <button class="btn-carrito" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" style="background: transparent; font-size: 1.5rem; padding: 0 1.5rem">CARRITO</button>
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Carrito de Compras</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div id="carrito">
                            <!-- Aquí se mostrarán los productos agregados al carrito -->
                        </div>
                        <p id="total">Total: $0</p>
                        <button class="btn btn-success" onclick="procederAlCheckout()">Proceder al Checkout</button>
                    </div>
                </div>
                <!---boton de carrito--->
                <?php echo anchor('productos', 'PRODUCTOS') ?>
                <?php echo anchor('venta', 'VENTA') ?>
            <?php else: ?>
                <div class="dropdown">
                    <button class="boton-usuario" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent; font-size: 1.5rem; padding: 0 1.5rem">
                        PERFIL
                    </button>
                    <ul class="dropdown-menu">
                        <p class="btn"><?php echo anchor('crud', 'ABM Usuarios') ?></p>
                        <p class="btn"><?php echo anchor('crudP', 'ABM Productos') ?></p>
                        <p class="btn"><a href="<?= base_url('/logout') ?>">Cerrar Sesión</a></p>
                    </ul>
                </div>
                <?php echo anchor('index', 'INICIO') ?>
                <?php echo anchor('acercaDe', 'ACERCA DE') ?>
            <?php endif; ?>
        <?php else: ?>
            <?php echo anchor('index', 'INICIO') ?>
            <?php echo anchor('login', 'INGRESAR') ?>
            <?php echo anchor('venta', 'VENTA') ?>
            <?php echo anchor('acercaDe', 'ACERCA DE') ?>
            <?php echo anchor('contacto', 'CONTACTO') ?>
        <?php endif; ?>
    </nav>
</div>

    <!-- JS PARA LA ANIMACION DE NAVBAR -->
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            var header = document.querySelector('header');

            if (prevScrollpos > currentScrollPos) {
                header.style.transform = 'translateY(0)';
            } else {
                header.style.transform = 'translateY(-100%)';
            }
            prevScrollpos = currentScrollPos;
        }
    </script>

</header>
