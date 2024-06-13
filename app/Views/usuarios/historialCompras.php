<main class="historial-compras">
<div class="container">
        <h1>Historial de Compras</h1>
        <?php if (empty($ventasConDetalles)): ?>
            <p>No se encontraron compras.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Total Venta</th>
                        <th>Tipo de Pago</th>
                        <th>Productos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventasConDetalles as $ventaConDetalles): ?>
                        <tr>
                            <td><?= $ventaConDetalles['venta']['fecha'] ?></td>
                            <td>$<?= number_format($ventaConDetalles['venta']['total_venta'], 2) ?></td>
                            <td><?= $ventaConDetalles['venta']['tipoPago_id'] == 1 ? 'Efectivo' : ($ventaConDetalles['venta']['tipoPago_id'] == 2 ? 'Tarjeta de Crédito' : 'Tarjeta de Débito') ?></td>
                            <td>
                                <ul>
                                    <?php foreach ($ventaConDetalles['productos'] as $producto): ?>
                                        <li><?= $producto['nombre'] ?> - Cantidad: <?= $producto['cantidad'] ?> - Precio: $<?= number_format($producto['precio'], 2) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</main>