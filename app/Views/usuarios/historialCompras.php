<main class="historial-compras">
<?php $pager = service('pager');?>
<div class="container-historial">
        <h1 class="titulo-historial">Historial de Compras</h1>
        <?php if (empty($ventasConDetalles)): ?>
            <p>No se encontraron compras.</p>
        <?php else: ?>
            <table class="tabla-historial">
                <thead class="thead-historial">
                    <tr class="tr-historial">
                        <th class="th-historial">Fecha</th>
                        <th class="th-historial">Total Venta</th>
                        <th class="th-historial">Tipo de Pago</th>
                        <th class="th-historial">Productos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventasConDetalles as $ventaConDetalles): ?>
                        <tr>
                            <td class="td-historial"><?= $ventaConDetalles['venta']['fecha'] ?></td>
                            <td class="td-historial">$<?= number_format($ventaConDetalles['venta']['total_venta'], 2) ?></td>
                            <td class="td-historial"><?= $ventaConDetalles['venta']['tipoPago_id'] == 1 ? 'Efectivo' : ($ventaConDetalles['venta']['tipoPago_id'] == 2 ? 'Tarjeta de Crédito' : 'Tarjeta de Débito') ?></td>
                            <td class="td-historial">
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
    <!---enlaces de paginación--->
    <div class="pagination">
        <?= $pager->links() ?>
    </div>
</main>