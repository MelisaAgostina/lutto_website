<section class="carrito">
<div class="container-carrito">

    <h1>Carrito de Compras</h1>

    <div class="cart">

        <div class="products-carrito">

            <?php if (!empty($productos)) : ?>
                <?php foreach ($productos as $item) : ?>
                    <div class="product-carrito">

                        <img src="<?php echo base_url('public/uploads/' . $item['imagen']); ?>" alt="Imagen del Producto">

                        <div class="product-info">

                            <h3 class="product-name"><?php echo $item['nombre']; ?></h3>

                            <h4 class="product-price">$<?php echo number_format($item['precio_vta'], 2); ?></h4>

                        </div>
                        <div class="product-options">
                        
                                <form action="<?php echo base_url('carrito/actualizar'); ?>" method="post" style="display:inline;">
                                    <input type="hidden" name="cart[<?php echo $item['rowid']; ?>][rowid]" value="<?php echo $item['rowid']; ?>">
                                    <p class="product-quantity">Cantidad:
                                    <input type="number" name="cart[<?php echo $item['rowid']; ?>][qty]" value="<?php echo $item['qty']; ?>" min="0">
                                    </p>
                                    <button class="boton-actualizar" type="submit">
                                    <i class="fa fa-solid fa-rotate-right"></i>    
                                    <span>Actualizar</span>
                                </button>
                                </form>
                          
                        
                                <form action="<?php echo base_url('carrito/remove/' . $item['rowid']); ?>" method="post" style="display:inline;">
                                    <button class="boton-remover" type="submit" >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        <span class="remove">Remover</span>
                                    </button>
                                </form>
                        </div>   

                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No hay artículos en el carrito</p>
            <?php endif; ?>

        </div>

        <div class="cart-total">
            <?php 
            $subtotal = 0;
            foreach ($productos as $item) {
                $subtotal += $item['precio_vta'] * $item['qty'];
            }
            
            $shipping = 15;
            $total = $subtotal + $shipping;
            ?>
            <p>
                <span>Total</span>
                <span>$<?php echo number_format($total, 2); ?></span>
            </p>

            <p>
                <span>Número de Ítems</span>
                <span><?php echo count($productos); ?></span>
            </p>

            <p>
                <span>Envío</span>
                <span>$<?php echo number_format($shipping,2); ?></span> <!-- asumiendo un desc del 10% para mas simplicidad -->
            </p>

            <a href="<?php echo base_url('carrito/checkout'); ?>">Proceder al Checkout</a>

        </div>

    </div>

</div>
</section>
