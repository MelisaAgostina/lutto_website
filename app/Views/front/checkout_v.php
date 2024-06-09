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
      $shipping = 15;

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
        <div class='credit-info'>
          <div class='credit-info-content'>
            <table class='half-input-table'>
              <tr><td>Selecciona una tarjeta: </td>
              <td><div class='dropdown' id='card-dropdown'>

                <select class='dropdown-btn' id='current-card' name="dropdown-select">
                        <option value="1">Elegir</option>
                        <option value="1">Visa</option>
                        <option value="2">Mastercard</option>
                        <option value="3">Maestro</option>
                </select>

              </td></tr>
            </table>
            <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>
            Número de Tarjeta
            <input type="number" class='input-field'></input>
            Nombre
            <input type="text" class='input-field'></input>
            <table class='half-input-table'>
              <tr>
                <td> Expira
                  <input type="date" class='input-field'></input>
                </td>
                <td>CVC
                  <input type="number" class='input-field'></input>
                </td>
              </tr>
            </table>
            <button class='pay-btn'>Checkout</button>

          </div>

        </div>
      </div>
</div>
<?php endif;?>
</section>