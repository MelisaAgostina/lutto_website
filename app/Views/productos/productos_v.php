<section class="products">
<?php if (isset($productos) && !empty($productos)): ?>

    <!---portada con video de fondo--->
    <div class="portada-productos">
        <video autoplay muted loop poster="assets/img/carousel3.jpg">
            <source src="assets/video/portadaproductos.mp4" type="video/mp4">
        </video>

        <div>
            <h1>EXPLORA NUESTRA SELECCIÓN</h1>
        </div>
    </div>

   <!---inttorduccion a la seccion prod--->
   <div class='intro-productos'>
              <h2 class="titulo-intro-productos">Descubre Tributos Significativos</h1>
              <p class="texto-intro-productos">Bienvenido/a a nuestra sección de productos, donde cada artículo está diseñado cuidadosamente para honrar el vínculo especial que compartiste con tu mascota. Explora nuestra colección de memorias conmovedoras elaboradas con cuidado y compasión. Desde elegantes urnas hasta recuerdos personalizados, cada producto es un tributo al amor y compañerismo que vivirá para siempre en tu corazón.</p>
        </div>

   <!---seccion 1--->
    <div class="container-secciones-productos">
             <img class="gatito" src="assets/img/seccion.png">
            <h2 class="seccion-titulo" style="font-weight: 600; text-align: center; background: thistle; color: indigo; padding: 0.3%; border-radius: 5px">Urnas y Velas</h2>

            <div class="box-container-secciones">

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya1.png" alt="">
                    <h3 class="subtitulo-secciones">Vela</h3>
                    <p class="texto-secciones">descrip</p>
                    <p class="btn"><?php echo anchor('urnas', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya 2.png" alt="">
                    <h3 class="subtitulo-secciones">Locket de Oro</h3>
                    <p class="texto-secciones">descrip</p>
                    <p class="btn"><?php echo anchor('urnas', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya3.png" alt="">
                    <h3 class="subtitulo-secciones">Colgante</h3>
                    <p class="texto-secciones">descrip</p>
                    <p class="btn"><?php echo anchor('urnas', 'ver más') ?></p>
                </div>

            </div>

          </div>
          <!---seccion 2---->
          <div class="container-secciones-productos">
             <img class="gatito" src="assets/img/seccion.png">
             <h2 class="seccion-titulo" style="font-weight: 600; text-align: center; background: thistle; color: indigo; padding: 0.3%; border-radius: 5px">Joyas Engravadas</h2>
            <div class="box-container-secciones">

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya1.png" alt="">
                    <h3 class="subtitulo-secciones">Set de Oro Engravado</h3>
                    <p class="texto-secciones">descrip</p>
                    <p class="btn"><?php echo anchor('fotografia', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya 2.png" alt="">
                    <h3 class="subtitulo-secciones">Locket de Oro</h3>
                    <p class="texto-secciones">descrip</p>
                    <p class="btn"><?php echo anchor('fotografia', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya3.png" alt="">
                    <h3 class="subtitulo-secciones">Colgante</h3>
                    <p class="texto-secciones">descrip</p>
                    <p class="btn"><?php echo anchor('fotografia', 'ver más') ?></p>
                </div>

            </div>

          </div>
          <!---seccion 3--->
          <div class="container-secciones-productos">
             <img class="gatito" src="assets/img/seccion.png">
             <h2 class="seccion-titulo" style="font-weight: 600; text-align: center; background: thistle; color: indigo; padding: 0.3%; border-radius: 5px">Retratos y Moldeados</h2>

            <div class="box-container-secciones">

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya1.png" alt="">
                    <h3 class="subtitulo-secciones">Set de Oro Engravado</h3>
                    <p class="texto-secciones">descrip</p>
                    <p class="btn"><?php echo anchor('joyeria', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya 2.png" alt="">
                    <h3 class="subtitulo-secciones">Locket de Oro</h3>
                    <p class="texto-secciones">descrip</p>
                    <p class="btn"><?php echo anchor('joyeria', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya3.png" alt="">
                    <h3 class="subtitulo-secciones">Colgante</h3>
                    <p class="texto-secciones">descrip</p>
                    <p class="btn"><?php echo anchor('joyeria', 'ver más') ?></p>
                </div>

            </div>
             <!--- inicia listado de productos--->
            <!---productos--->
    <div class="container-productos-general">
        <div class="products-container">

            <?php foreach ($productos as $producto): ?>

                    <div class="product" data-name="<?php echo 'p-' . $producto['id_producto']; ?>">
                        <img src="<?php echo base_url('public/uploads/' . $producto['imagen']); ?>" alt="">
                        <h3 class="nombre-prod"><?php echo $producto['nombre']; ?></h3>
                        <div class="price"><?php echo '$' . $producto['precio_vta']; ?></div>
                    </div>

            <?php endforeach; ?>

        </div>
    </div>


    <!---reviews--->
    <div class="products-preview">
              
        <?php foreach ($productos as $producto): ?>

                <div class="preview" data-target="p-<?php echo $producto['id_producto']; ?>">
                    <i class="fas fa-times"></i>
                    <img src="<?php echo base_url('public/uploads/' . $producto['imagen']); ?>" alt="">
                    <h3 class="nombre-prod"><?php echo $producto['nombre']; ?></h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(250)</span>
                    </div>
                    <p class="texto-prod"><?php echo $producto['descripcion']; ?></p>
                    <div class="price"><?php echo '$' . $producto['precio_vta']; ?></div>
                    <div class="buttons">
                        <!---<a href="#" class="buy">comprar ahora</a>
                        <a href="#" class="cart">añadir al carrito</a>--->

                        <!-- Formulario para "comprar ahora" -->
                    <form action="<?php echo base_url('carrito/checkout'); ?>" method="post" enctype="multipart/form-data">
                        
                        <input type="hidden" name="id" value="<?php echo $producto['id_producto']; ?>">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="price" value="<?php echo $producto['precio_vta']; ?>">
                        <input type="hidden" name="name" value="<?php echo $producto['nombre']; ?>">
                        <button type="submit" class="buy">comprar ahora</button>
                    </form>
                    <!-- Formulario para "añadir al carrito" -->
                    <form action="<?php echo base_url('carrito/add'); ?>" method="post" enctype="multipart/form-data">
                        
                        <input type="hidden" name="id" value="<?php echo $producto['id_producto']; ?>">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="price" value="<?php echo $producto['precio_vta']; ?>">
                        <input type="hidden" name="name" value="<?php echo $producto['nombre']; ?>">
                        <button type="submit" class="cart">añadir al carrito</button>
                    </form>
                    </div>
                </div>
        <?php endforeach; ?>

    </div>
<?php endif; ?>
<!---termina listado de productos--->
</div>


  <ul class="pagination"><!---data table js en todas las tablas--->

    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>

    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>

  </ul>



</section>