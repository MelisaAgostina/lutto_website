<section class="checkout">
<?php if (isset($productos)):?>
<div class='container-checkout'>
  <div class='window'>
    <div class='order-info'>
      <div class='order-info-content'>
        <h2 class="titulo-checkout">Resumen de Orden</h2>

<!---un producto--->
<?php if(!empty($productos)):?>
  <?php foreach ($productos as $item):?>

        <div class='line'></div>
            <table class='order-table'>
            <tbody>
                <tr>
                <td><img src="<?php echo base_url('public/uploads/' . $item['imagen']); ?>" alt="Imagen del Producto" class='full-width'></img>
                </td>
                <td>
                    <br> <span class='thin'><?php echo $item['nombre']; ?></span>
                </td>

                </tr>
                <tr>
                <td>
                    <div class='price-checkout'>$<?php echo number_format($item['precio_vta'], 2); ?></div>
                </td>
                </tr>
            </tbody>

            </table>

  <?php endforeach; ?>
<?php endif; ?>

<!---total del reusmen--->

    <!---calculo de costos--->
    <?php 
      $subtotal = 0;
      $shipping = 2000;

        foreach ($productos as $item) {
            $subtotal += $item['precio_vta'] * $item['qty'];
        }
      
      $total = $subtotal + $shipping;
    ?>
    <!---calculo de costos--->



        <div class='line'></div>
        <div class='total'>

          <span style='float:left;'> <!---montos--->
            <div class='thin dense'>Envío</div>
            TOTAL
          </span>


          <span style='float:right; text-align:right;'> <!---monto precio--->
            <div class='thin dense'>$<?php echo number_format($shipping,2); ?></span></div>
            $<?php echo number_format($total, 2); ?>
          </span>

        </div>
    </div>
</div>


<!---columna de tarjeta--->
<form class='credit-info' method="post" action="<?php echo base_url('carrito/checkout') ?>">

    <div>
        <div class='credit-info-content'>
            <table class='half-input-table'>
                <tr>
                    <td>Selecciona una tarjeta: </td>
                    <td>
                        <div class='dropdown' id='card-dropdown'>
                            <select name="tipoPago_id" class='dropdown-btn' id='current-card' required>
                                <option value="">Elegir</option>
                                <option value="2">Tarjeta de Crédito</option>
                                <option value="3">Tarjeta de Débito</option>
                            </select>
                        </div>
                    </td>
                </tr>
            </table>
            <img src="<?= base_url('assets/img/visaLogo.png') ?>" height='80' class='credit-card-image' id='credit-card-image'></img>
            Número de Tarjeta
            <input type="number" name="tarjeta" id="tarjeta" value="<?= old('tarjeta') ?>" class='input-field' required></input>
            Nombre
            <input type="text" name="nombre" value="<?= old('nombre') ?>" class='input-field' required></input>
            <table class='half-input-table'>
                <tr>
                    <td> Expira
                        <input type="date" name="expira" value="<?= old('expira') ?>" class='input-field' required></input>
                    </td>
                    <td>CVC
                        <input type="number" name="cvc" value="<?= old('cvc') ?>" class='input-field' required></input>
                    </td>
                </tr>
            </table>
            <button type="submit" class='pay-btn'>Comprar</button>
        </div>
    </div>
</form>
</div>
<?php endif;?>

    

<!-- Mensaje de Error -->
<?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    
</section>