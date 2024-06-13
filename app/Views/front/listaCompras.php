<main class="compras-admin">
<div class="container">
        <h1>Todas las Compras Registradas</h1>

            <!-- Mensaje de Error -->
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg')?>
                </div>
            <?php endif;?>
            
        <table>
            <thead>
                <tr>
                    <th>ID de Venta</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Total Venta</th>
                    <th>Tipo de Pago</th>
                    <th>Productos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventasConDetalles as $ventaConDetalles): ?>
                    <tr>
                        <td><?= $ventaConDetalles['venta']['id'] ?></td>
                        <td><?= $ventaConDetalles['venta']['fecha'] ?></td>
                        <td><?= $ventaConDetalles['usuario']['nombre'] ?></td>
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
    </div>
</main>