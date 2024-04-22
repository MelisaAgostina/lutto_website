<!DOCTYPE html>
<html>
    <head>  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       

        <link rel="stylesheet" href="assets/css/miestilo.css">
        <link rel="stylesheet" href="assets/css/venta.css">
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="assets/css/footer.css">
        <link rel="stylesheet" href="assets/css/acercaDe.css">
        <link rel="stylesheet" href="assets/css/contacto.css">
        <link rel="stylesheet" href="assets/css/productos.css">
        <link rel="stylesheet" href="assets/css/terminos.css">
        <link rel="stylesheet" href="assets/css/privacidad.css">
        <link rel="stylesheet" href="assets/css/faq.css">
        <link rel="stylesheet" href="assets/css/iniciarSesion.css">
        <link rel="stylesheet" href="assets/css/registrarse.css">
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
    <div class="navigation-container">
    <input type="checkbox" name="" id="toggler">
    <label for="toggler"><i class="fa fa-paw" aria-hidden="true"></i></label>

    <a href="#" class="logo"><img src="assets/img/logo4.png" alt="LogoLutto"></a>

    <nav class = "navbar">
      <?php echo anchor('index', 'INICIO') ?>
      <?php echo anchor('acercaDe', 'ACERCA DE') ?>
      <?php echo anchor('productos', 'PRODUCTOS') ?>
      <?php echo anchor('venta', 'VENTA') ?>
      <?php echo anchor('contacto', 'CONTACTO') ?>
    </nav>
    </div>



    <!---JS PARA LA ANIMACION DE NAVBAR--->
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
<!---BARRA DE NAVEGACION TERMINA--->
