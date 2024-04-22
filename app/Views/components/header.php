<!---BARRA DE NAVEGACIÓN COMIENZA--->
<header>
    <div class="navigation-container">
    <input type="checkbox" name="" id="toggler">
    <label for="toggler"><i class="fa fa-paw" aria-hidden="true"></i></label>

    <a href="#" class="logo"><img src="assets/img/logo4.png" alt="LogoLutto"></a>
    </div>

    <nav class = "navbar">
      <a href="index.php#inicio">INICIO</a>
      <a href="index.php#acercaDe">ACERCA DE</a>
      <a href="index.php#productos">PRODUCTOS</a>
      <a href="index.php#venta">VENTA</a>
      <a href="index.php#contacto">CONTACTO</a>
    </nav>

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