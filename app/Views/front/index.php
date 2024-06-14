<section class="index" id="index">

    <div class="contenido">

            <!---CAROUSEL--->
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
              
              <div class="carousel-inner">

                <div class="carousel-item active">
                  <img src="assets/img/carousel4.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption carousel-caption-top d-none d-md-block text-start">
                    <h2>ELABORADO CON TERNURA</h2>
                    <p>Bienvenido a Lutto, donde cada producto se elabora con compasión y respeto por la memoria de tu mascota</p>
                    <button class="navegar"><?php echo anchor('faq', 'Dudas Frecuentes') ?></button>
                  </div>
                </div>

                <div class="carousel-item">
                  <img src="assets/img/carousel2.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption carousel-caption-top d-none d-md-block text-start">
                    <h2>EXCELENCIA CON CORAZÓN</h2>
                    <p>Descubre nuestro compromiso con la calidad y la compasión mientras te ayudamos a encontrar el tributo perfecto para tu querida mascota.</p>
                    <button class="navegar"><?php echo anchor('acercaDe', 'Sobre Nosotros') ?></button>
                  </div>
                </div>

                <div class="carousel-item">
                  <img src="assets/img/carousel6.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption carousel-caption-top d-none d-md-block text-start">
                    <h2>MEMORIALES A MEDIDA</h2>
                    <p>Explora nuestra variedad de opciones personalizadas, porque cada mascota merece un memorial único y significativo.</p>
                    <button class="navegar"><?php echo anchor('productos_v', 'Comprar Ahora') ?></button>
                  </div>
                </div>

                <div class="carousel-item">
                  <img src="assets/img/carousel1.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption carousel-caption-top d-none d-md-block text-start">
                    <h2>VÍNCULOS MÁS ALLÁ DE LAS FRONTERAS</h2>
                    <p>Únete a nuestra comunidad de amantes de las mascotas y encuentra consuelo compartiendo historias y recuerdos de tus entrañables compañeros.</p>  
                    <button class="navegar"><?php echo anchor('/registro', 'Registrarse') ?></button>
                  </div>
                </div>



              </div>

              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
              
            </div>
            <!---TERMINA CARRUSEL--->

            <!---DESCRIPCION--->
            <div class='descrip'>
              <h2 class="titulo-descrip-index" style="padding-top: 5%">¿Por qué elegirnos?</h1>
              <p class="texto-index">En Lutto, estamos comprometidos no solo a proporcionar productos de alta calidad, sino también un apoyo sincero a aquellos que están navegando el camino de la pérdida de una mascota. Creemos que cada mascota merece ser recordada con dignidad y amor, y es nuestro privilegio ayudarte a encontrar la manera perfecta de honrar su memoria.
            </p>

              <h2 class="titulo-descrip-index">Nuestro Compromiso con la Calidad</h2>
              <p class="texto-index">Cuando eliges Lutto, puedes confiar en que cada producto de nuestra colección ha sido seleccionado cuidadosamente por su calidad y artesanía. Desde urnas exquisitamente diseñadas hasta joyería delicada, cada artículo es seleccionado con el máximo cuidado para garantizar que cumpla con nuestros estándares de excelencia.
            </p>

            <h2 class="titulo-descrip-index">Empatía y Entendimiento</h2>
              <p class="texto-index">Entendemos que cada mascota ocupa un lugar único en tu corazón, y cada pérdida se siente profundamente. Es por eso que abordamos nuestro trabajo con empatía y comprensión, brindando un espacio seguro donde puedas explorar nuestras ofertas a tu propio ritmo, sabiendo que estamos aquí para apoyarte en cada paso del camino.
            </p>

            </div>

        <!---PRODUCTOS DESTACADOS--->
    
          <div class="portada-destacados">
            <img src="assets/img/carousel5.jpg" alt="Imagen de portada">
            <div class="cover-text">
                <h1>PRODUCTOS DESTACADOS</h1>
            </div>
        </div>

        <div class='descrip'>
              <p class="texto-index">Explora nuestra selección curada de productos destacados para rendir un homenaje significativo a tu querida mascota</p>
              
        </div>



          <div class="container-prod-destacados">
            <div class="box-container-destacados">

                <div class="box-destacados">
                    <img src="assets/img/joya1.png" alt="">
                    <h3 class="subtitulo-destacados">Set de Oro Engravado</h3>
                    <p class="texto-destacados">descrip</p>
                    <p class="btn"><?php echo anchor('productos_v', 'ver más') ?></p>
                </div>

                <div class="box-destacados">
                    <img src="assets/img/joya 2.png" alt="">
                    <h3 class="subtitulo-destacados">Locket de Oro</h3>
                    <p class="texto-destacados">descrip</p>
                    <p class="btn"><?php echo anchor('productos_v', 'ver más') ?></p>
                </div>

                <div class="box-destacados">
                    <img src="assets/img/joya3.png" alt="">
                    <h3 class="subtitulo-destacados">Colgante</h3>
                    <p class="texto-destacados">descrip</p>
                    <p class="btn"><?php echo anchor('productos_v', 'ver más') ?></p>
                </div>

            </div>

          </div>


          <!---STEPS / CARDS--->
          <div class="descrip">
          <h2 class="titulo-descrip-index">¿Cuál es el proceso?</h1>
            <p class="texto-index">Ya sea que tu mascota haya fallecido recientemente o estés preparándote para el momento inevitable, no dudes en contactarnos. Te ayudaremos a programar una cita, asegurando que tu querido compañero reciba el cuidado y el respeto que se merece.
            </p>
          </div>
          <div class="card-container">
              <div class="card" style="width: 18rem;">
                  <img src="assets/img/step1.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5>Explora</h5>
                      <p class="card-text">Sumérgete en nuestra colección seleccionada de productos conmemorativos sinceros, que van desde urnas hasta joyería y velas.</p>
                  </div>
              </div>
              <div class="card" style="width: 18rem;">
                  <img src="assets/img/step2.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5>Selecciona</h5>
                      <p class="card-text">Tómate tu tiempo para elegir el tributo ideal que resuene con el amor y los recuerdos que compartiste con tu querida mascota.</p>
                  </div>
              </div>
              <div class="card" style="width: 18rem;">
                  <img src="assets/img/step3.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5>Realiza tu pedido con confianza</h5>
                      <p class="card-text">Procede al pago de forma segura, sabiendo que tu memorial elegido será entregado con cuidado y respeto para honrar el legado de tu mascota.</p>
                  </div>
              </div>
          </div>

          <!---JS DE TRANSICION DE CARDS--->
          <script>
          function checkScroll() {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
              const rect = card.getBoundingClientRect();
              const isVisible = (rect.top >= 0 && rect.bottom <= window.innerHeight);
              if (isVisible) {
                setTimeout(() => {
                  card.classList.add('show');
                }, index * 400); // Ajusta el valor del retraso según tus necesidades
              }
            });
          }

          window.addEventListener("scroll", checkScroll);
          checkScroll(); // Check on page load
          </script>

          <!---RECOMENDACIONES--->
          <div class="recomendaciones">
            <div class="inner">
              <h2 class="titulo-rec">Recomendaciones</h2>
              <div class="border"></div>

                <div class="row-rec">

                  <div class="col-rec">
                    <div class="rec">
                      <img src="assets/img/review1.jpg" alt="">
                      <div class="name-rec">ana lopez</div>
                      <p class="texto-rec">Despedirnos de nuestro querido compañero fue difícil. Lutto hizo que el proceso fuera mucho más fácil. Desde la primera llamada hasta recoger el memorial, su cuidado y apoyo significaron el mundo. Gracias por todo.</p>
                    </div>
                  </div>


                  <div class="col-rec">
                    <div class="rec">
                      <img src="assets/img/review2.jpg" alt="">
                      <div class="name-rec">Carlos Martinez</div>
                      <p class="texto-rec">Recientemente perdimos a nuestro miembro peludo de la familia, y Lutto estuvo allí para nosotros en cada paso del camino. La compasión y atención al detalle que mostraron fueron increíbles. Estamos agradecidos por su servicio.</p>
                    </div>
                  </div>


                  <div class="col-rec">
                    <div class="rec">
                      <img src="assets/img/review3.jpeg" alt="">
                      <div class="name-rec">maría rodriguez</div>
                      <p class="texto-rec">Hace poco perdimos a nuestro fiel integrante peludo de la familia, y Lutto estuvo allí para acompañarnos en todo momento. Su compasión y atención al detalle fueron excepcionales. Estamos agradecidos.</p>
                    </div>
                  </div>


                </div>
              
            </div>
          </div>






          <!---EQUIPO---->
          <div class="border2"></div>
        </div><!---TERMINA SECCION CONTENIDO--->
        <div class='descrip'>
              <h2 class="titulo-descrip-index">Compañía Funeraria Lutto en Argentina</h1>
              <p class="texto-index">Lutto ofrece productos funerarios en el Nordeste de Argentina. Somos una empresa familiar con un equipo dedicado de amantes de los animales que comprenden lo difícil que es perder a tu querido amigo peludo.</p>
              <p class="texto-index">Estamos aquí para ayudar a aliviar el dolor y ofrecer nuestro apoyo brindando a tu mascota un memorial digno de su recuerdo. Queremos asegurarte a ti y a tu familia que tu mascota está en manos de personas que realmente se preocupan por ellos.</p>
        
              <img src="assets/img/negri1.jpg" alt="" >
        </div>

        
</section>

