<section class="joyeria">

    <!---portada--->
    <div class="portada-joyeria">
        <img src="<?= base_url('assets/img/joyeria2.jpg') ?>" alt="Imagen de portada">
        <div class="cover-text">
            <h1>ENGRAVADOS</h1>
        </div>
    </div>

    <div class="container-productos-general">
        <div class="products-container">
            <?php foreach ($productos as $producto): ?>
                <div class="product" data-name="p-<?= $producto['id_producto'] ?>">
                    <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" alt="<?= $producto['nombre'] ?>">
                    <h3 class="nombre-prod"><?= $producto['nombre'] ?></h3>
                    <div class="price">$<?= number_format($producto['precio'], 2) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="products-preview">
        <?php foreach ($productos as $producto): ?>
            <div class="preview" data-target="p-<?= $producto['id_producto'] ?>">
                <i class="fas fa-times"></i>
                <img src="<?= base_url('assets/img/' . $producto['imagen']) ?>" alt="<?= $producto['nombre'] ?>">
                <h3 class="nombre-prod"><?= $producto['nombre'] ?></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span>(250)</span>
                </div>
                <p class="texto-prod"><?= $producto['descripcion'] ?></p>
                <div class="price">$<?= number_format($producto['precio'], 2) ?></div>
                <div class="buttons">
                    <a href="#" class="buy">comprar ahora</a>
                    <a href="#" class="cart">añadir al carrito</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<!---termina productos--->


<!---formulario consulta sobre prod--->
<p class="consulta-prod">Si tienes dudas acerca de algún producto no dudes en ponerte en contacto:</p>

<div class="fila">

         
        <form action="">
            <input type="text" placeholder="Nombre" class="box" required>
            <input type="text" placeholder="Producto" class="box" required>
            <textarea name="" class="box" placeholder="Mensaje..." id="" cols="30" rows="10" required></textarea>
            <input type="submit" value="Enviar" class="btn">
            <input type="submit" value="Limpiar" class="btn">
        </form>

    </div>
</section>