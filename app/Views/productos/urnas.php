<section class="urnas">
<?php if (isset($productos) && !empty($productos)): ?>
   
    <!---portada--->
    <div class="portada-urnas">
            <img src="assets/img/portadaurnas.jpg" alt="Imagen de portada">
            <div class="cover-text">
                <h1>URNAS Y VELAS</h1>
            </div>
    </div>
 

   <!---productos--->
    <div class="container-productos-general">
        <div class="products-container">

            <?php foreach ($productos as $producto): ?>
                <?php if($producto['activo'] == 'SI' && $producto['categoria_id'] == 1): ?>

                    <div class="product" data-name="<?php echo 'p-' . $producto['id_producto']; ?>">
                        <img src="<?php echo base_url('public/uploads/' . $producto['imagen']); ?>" alt="">
                        <h3 class="nombre-prod"><?php echo $producto['nombre']; ?></h3>
                        <div class="price"><?php echo '$' . $producto['precio_vta']; ?></div>
                    </div>

                <?php endif; ?>
            <?php endforeach; ?>

        </div>
    </div>


    <!---reviews--->
    <div class="products-preview">

        <?php foreach ($productos as $producto): ?>
                <?php if($producto['activo'] == 'SI' && $producto['categoria_id'] == 1): ?>

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
                        <input type="hidden" name="price-seccion" value="<?php echo $producto['precio_vta']; ?>">
                        <input type="hidden" name="name" value="<?php echo $producto['nombre']; ?>">
                        <button type="submit" class="buy">comprar ahora</button>
                    </form>
                    <!-- Formulario para "añadir al carrito" -->
                    <form action="<?php echo base_url('carrito/add'); ?>" method="post" enctype="multipart/form-data">
                        
                        <input type="hidden" name="id" value="<?php echo $producto['id_producto']; ?>">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="price" value="<?php echo $producto['precio_vta']; ?>">
                        <input type="hidden" name="name" value="<?php echo $producto['nombre']; ?>">
                        <button type="submit" class="cart-add">añadir al carrito</button>
                    </form>
                    </div>
                </div>
                
                <?php endif; ?>
        <?php endforeach; ?>

    </div>

<!---formulario para consultas--->
<p class="consulta-prod">Si tienes dudas acerca de algún producto no dudes en ponerte en contacto:</p>

   <div class="fila">
         
        <form action="<?php echo base_url('consultas/saveP'); ?>" method="post">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="box" required>
            <input type="text" name="producto" id="nombre" placeholder="Producto" class="box" required>
            <textarea type="text" name="mensaje" id="mensaje" class="box" placeholder="Mensaje..." id="" cols="30" rows="10" required></textarea>
            <input type="submit" value="Enviar" class="btn">
            <input type="submit" value="Limpiar" onclick="borrarTextArea()" class="btn">
        </form>

    </div>

    <script>
        function borrarTextArea() {
            // Obtener todos los campos de texto en el formulario
            var camposTexto = document.querySelectorAll('input[type="text"]');

            // Iterar sobre cada campo de texto y limpiar su contenido
            camposTexto.forEach(function(campo) {
                campo.value = '';
            });
        }
    </script>

<?php endif; ?>
</section>
