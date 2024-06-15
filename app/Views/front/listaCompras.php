<main class="compras-admin">
    <?php $pager = service('pager');?>
    <div class="container-compras">
        <h1 class="titulo-compras-reg">Todas las Compras Registradas</h1>

        <!-- Mensaje de Error -->
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-warning">
                <?= session()->getFlashdata('msg')?>
            </div>
        <?php endif;?>

        <table class="tabla-compras">
            <thead class="tablehead-compras">
                <tr class="tr-compras">
                    <th class="th-compras">ID de Venta</th>
                    <th class="th-compras">Fecha</th>
                    <th class="th-compras">Usuario</th>
                    <th class="th-compras">Total Venta</th>
                    <th class="th-compras">Tipo de Pago</th>
                    <th class="th-compras">Productos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventasConDetalles as $ventaConDetalles): ?>
                    <tr>
                        <td class="td-compras"><?= $ventaConDetalles['venta']['id'] ?></td>
                        <td class="td-compras"><?= $ventaConDetalles['venta']['fecha'] ?></td>
                        <td class="td-compras"><?= $ventaConDetalles['usuario']['nombre'] ?></td>
                        <td class="td-compras">$<?= number_format($ventaConDetalles['venta']['total_venta'], 2) ?></td>
                        <td class="td-compras"><?= $ventaConDetalles['venta']['tipoPago_id'] == 1 ? 'Efectivo' : ($ventaConDetalles['venta']['tipoPago_id'] == 2 ? 'Tarjeta de Crédito' : 'Tarjeta de Débito') ?></td>
                        <td class="td-compras">
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

    <!-- Enlaces de paginación -->
    <div class="pagination">
        <?= $pager->links() ?>
    </div>
</main>
