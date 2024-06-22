<section class="products">
<?php if (isset($productos) && !empty($productos)): ?>
<?php $pager = service('pager');?>


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
    
   <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: relative; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); animation: fadeIn 0.5s;">
        <div style="display: flex; align-items: center;">
            <div style="margin-right: 10px; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #28a745; border-radius: 50%; color: white;">
                <i class="fas fa-check"></i>
            </div>
            <div style="flex-grow: 1;">
                <?= session()->getFlashdata('msg') ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="position: absolute; top: 10px; right: 10px; background: none; border: none;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .btn-close {
            font-size: 1.2rem;
            cursor: pointer;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
    <?php endif; ?>


              <h2 class="titulo-intro-productos">Descubre Tributos Significativos</h1>
              <p class="texto-intro-productos">Bienvenido a nuestra sección de productos, donde cada artículo está diseñado cuidadosamente para honrar el vínculo especial que compartiste con tu mascota. Explora nuestra colección de memorias conmovedoras elaboradas con cuidado y compasión. Desde elegantes urnas hasta recuerdos personalizados, cada producto es un tributo al amor y compañerismo que vivirá para siempre en tu corazón.</p>
    </div>

   <!---seccion 1--->
    <div class="container-secciones-productos">
             <img class="gatito" src="assets/img/seccion.png">
            <h2 class="seccion-titulo" style="font-weight: 600; text-align: center; background: thistle; color: indigo; padding: 0.3%; border-radius: 5px">Urnas y Velas</h2>

            <div class="box-container-secciones">

                <div class="box-seccion">
                    <img class="sec" src="assets/img/vela2.png" alt="">
                    <h3 class="subtitulo-secciones">Portavelas de Roble</h3>
                    <p class="texto-secciones">Urna de madera de roble con portavelas integrado y huella de la mascota grabada.</p>
                    <p class="btn"><?php echo anchor('catalogo/1', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/vela1.png" alt="">
                    <h3 class="subtitulo-secciones">Vela Conmemorativa</h3>
                    <p class="texto-secciones">Vela conmemorativa en frasco de vidrio, personalizable con la foto y nombre de tu mascota.</p>
                    <p class="btn"><?php echo anchor('catalogo/1', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/urna4.png" alt="">
                    <h3 class="subtitulo-secciones">Casita de Pino</h3>
                    <p class="texto-secciones">Urna de madera de pino con diseño de casita, incluye espacio para una foto.</p>
                    <p class="btn"><?php echo anchor('catalogo/1', 'ver más') ?></p>
                </div>

            </div>

          </div>
          <!---seccion 2---->
          <div class="container-secciones-productos">
             <img class="gatito" src="assets/img/seccion.png">
             <h2 class="seccion-titulo" style="font-weight: 600; text-align: center; background: thistle; color: indigo; padding: 0.3%; border-radius: 5px">Joyas Engravadas</h2>
            <div class="box-container-secciones">

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya13.png" alt="">
                    <h3 class="subtitulo-secciones">Dije con Grabado</h3>
                    <p class="texto-secciones">Colgantes circulares de oro rosa personalizados con el grabado de la imagen y el nombre de tu mascota.</p>
                    <p class="btn"><?php echo anchor('catalogo/3', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya4.png" alt="">
                    <h3 class="subtitulo-secciones">Relicario Corazón</h3>
                    <p class="texto-secciones">Medallón en forma de corazón con foto personalizada de tu mascota en su interior.</p>
                    <p class="btn"><?php echo anchor('catalogo/3', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/joya10.png" alt="">
                    <h3 class="subtitulo-secciones">Colgante con Fotografía</h3>
                    <p class="texto-secciones">Colgante en forma de huella disponible en acabados plateado, dorado y rosado. Personalizable según la foto de tu mascota.</p>
                    <p class="btn"><?php echo anchor('catalogo/3', 'ver más') ?></p>
                </div>

            </div>

          </div>
          <!---seccion 3--->
          <div class="container-secciones-productos">
             <img class="gatito" src="assets/img/seccion.png">
             <h2 class="seccion-titulo" style="font-weight: 600; text-align: center; background: thistle; color: indigo; padding: 0.3%; border-radius: 5px">Retratos y Moldeados</h2>

            <div class="box-container-secciones">

                <div class="box-seccion">
                    <img class="sec" src="assets/img/casting1.png" alt="">
                    <h3 class="subtitulo-secciones">Casting de Huella</h3>
                    <p class="texto-secciones">Esculturas de huellas de mascota realizadas mediante proceso de casting. Se utiliza un molde de silicona para capturar cada detalle de la huella.</p>
                    <p class="btn"><?php echo anchor('catalogo/2', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/foto2.png" alt="">
                    <h3 class="subtitulo-secciones">Retrato Personalizado</h3>
                    <p class="texto-secciones">Retrato personalizado de mascotas enmarcado, ideal para honrar a tus queridos compañeros. Incluye una ilustración detallada.</p>
                    <p class="btn"><?php echo anchor('catalogo/2', 'ver más') ?></p>
                </div>

                <div class="box-seccion">
                    <img class="sec" src="assets/img/foto1.png" alt="">
                    <h3 class="subtitulo-secciones">Portarretrato de Cerámico</h3>
                    <p class="texto-secciones">Portarretrato conmemorativo que incluye una vela, diseñado para honrar la memoria de tu mascota. Personaliza con la foto de tu fiel compañero.</p>
                    <p class="btn"><?php echo anchor('catalogo/2', 'ver más') ?></p>
                </div>

            </div>
             <!--- inicia listado de productos--->
            <!---productos--->
    <div class="container-productos-general">

    <h2 class="seccion-titulo" style="font-weight: 600; text-align: center; background: thistle; color: indigo; padding: 0.3%; border-radius: 5px; margin-top: 2rem; margin-bottom: 2rem">Todos los Productos</h2>

        <div class="products-container">
            <?php foreach ($productos as $producto): ?>
                <?php if($producto['activo'] == 'SI'):?>
                    <?php if ($producto['stock'] >= $producto['stock_min']):?>
                    <div class="product" data-name="<?php echo 'p-' . $producto['id_producto']; ?>">
                        <img src="<?php echo base_url('public/uploads/' . $producto['imagen']); ?>" alt="">
                        <h3 class="nombre-prod"><?php echo $producto['nombre']; ?></h3>
                        <div class="price"><?php echo '$' . $producto['precio_vta']; ?></div>
                    </div>
                    <?php else:?>
                        <div class="product" data-name="<?php echo 'p-' . $producto['id_producto']; ?>">
                        <img src="<?php echo base_url('public/uploads/' . $producto['imagen']); ?>" alt="">
                        <h3 class="nombre-prod"><?php echo $producto['nombre']; ?></h3>
                        <div class="price">Sin Stock</div>
                    </div>
                    <?php endif;?>
                <?php endif;?>
            <?php endforeach; ?>

        </div>
    </div>

    <!---enlaces de paginación--->
    <div class="pagination">
        <?= $pager->links() ?>
    </div>
    
    <!---reviews--->
    <div class="products-preview">
              
        <?php foreach ($productos as $producto): ?>
            <?php if($producto['activo'] == 'SI'):?>
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
                    <?php if ($producto['stock'] >= $producto['stock_min']):?>
                    <!-- Formulario para "añadir al carrito" -->
                    <form action="<?php echo base_url('carrito/add'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $producto['id_producto']; ?>">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="price" value="<?php echo $producto['precio_vta']; ?>">
                        <input type="hidden" name="name" value="<?php echo $producto['nombre']; ?>">
                        <button type="submit" class="cart-add">añadir al carrito</button>
                    </form>
                    <?php else:?>
                        <button type="" style="color: grey; cursor: not-allowed" class="cart-add">añadir al carrito</button>
                    <?php endif; ?>
                    </div>
                </div>
                <?php endif;?>
        <?php endforeach; ?>

    </div>
<?php endif; ?>
<!---termina listado de productos--->

</div>
  
</section>