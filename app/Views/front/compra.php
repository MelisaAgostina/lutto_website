<main class="compra">
    <div class="container">
        <h1>Detalles de la Compra</h1>
        <p><strong>Nombre del comprador:</strong> <?= $usuario['nombre'] ?></p>
        <p><strong>Fecha de la compra:</strong> <?= $venta['fecha'] ?></p>
        <p><strong>Total de la compra:</strong> $<?= number_format($venta['total_venta'], 2) ?></p>
        <p><strong>Tipo de pago:</strong> <?= $venta['tipoPago_id'] == 1 ? 'Efectivo' : ($venta['tipoPago_id'] == 2 ? 'Tarjeta de Crédito' : 'Tarjeta de Débito') ?></p>

        <h2>Productos Comprados</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['cantidad'] ?></td>
                        <td>$<?= number_format($producto['precio'], 2) ?></td>
                        <td>$<?= number_format($producto['cantidad'] * $producto['precio'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button class="comprobante">Descargar Comprobante</button>
    </div>
</main>