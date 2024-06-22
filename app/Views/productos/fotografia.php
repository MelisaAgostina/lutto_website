<section class="fotografia">
<?php if(isset($productos) && !empty($productos)): ?>
<?php $pager = service('pager');?>
    <!---portada--->
    <div class="portada-fotografia">
            <img src="<?= base_url('assets/img/fotografia2.jpg') ?>" alt="Imagen de portada">
            <div class="cover-text">
                <h1>RETRATOS Y MOLDEADOS</h1>
            </div>
    </div>
 


<!---productos--->
<div class="container-productos-general">

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


    <div class="products-container">

        <?php foreach ($productos as $producto): ?>
            <?php if($producto['activo'] == 'SI'): ?>
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
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
</div>

<div class="pagination">
        <?= $pager->links() ?>
    </div>

<!---reviews--->
<div class="products-preview">

    <?php foreach ($productos as $producto): ?>
        <?php if($producto['activo'] == 'SI'): ?>

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

        <?php endif; ?>
    <?php endforeach; ?>

</div>

<!---formulario consulta sobre prod--->
<p class="consulta-prod">Si tienes dudas acerca de algún producto no dudes en ponerte en contacto:</p>

<div class="fila">

         
    <form action="<?php echo base_url('consultas/saveP'); ?>" method="post">
        <!-- Mensajes de error/exito -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

            <input type="text" name="nombre" id="nombre" value="<?= old('nombre') ?>" placeholder="Nombre" class="box" required>
            <input type="text" name="producto" id="nombre" value="<?= old('producto') ?>" placeholder="Producto" class="box" required>
            <textarea type="text" name="mensaje" id="mensaje" value="<?= old('mensaje') ?>" class="box" placeholder="Mensaje..." id="" cols="30" rows="10" required></textarea>
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