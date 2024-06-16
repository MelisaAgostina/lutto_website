<main class="index-crud">
    <div class="container-crud-index">

        <?php if (isset($msg)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $msg ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <button class="btn-crud" onclick="window.location.href='<?php echo base_url('productos/create'); ?>'">Añadir Nuevo</button>
        
        <table id="myTable" class="table-productos">
            <thead class="thead-productos">
                <tr class="tr-productos">
                    <th class="th-productos">Categoría</th>
                    <th class="th-productos">Nombre</th>
                    <th class="th-productos">Precio de Venta</th>
                    <th class="th-productos">Stock</th>
                    <th class="th-productos">Imagen</th>
                    <th class="th-productos">Activo</th>
                    <th class="th-productos">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($productos) && !empty($productos)): ?>
                    <?php foreach ($productos as $producto): ?>
                        <tr class="tr-productos">
                            <td class="td-productos"><?= $producto['categoria_id'] ?></td>
                            <td class="td-productos"><?= $producto['nombre'] ?></td>
                            <td class="td-productos"><?php echo '$' . $producto['precio_vta']; ?></td>
                            <td class="td-productos"><?= $producto['stock'] ?></td>
                            <td class="td-productos">                   
                                <?php if ($producto['imagen']): ?>
                                 <img src="<?php echo base_url('public/uploads/' . $producto['imagen']); ?>" alt="Imagen del producto" style="width: 100px; height: auto;">
                                <?php else: ?>
                                     No hay imagen
                                <?php endif; ?>

                            </td>
                            <td><?= $producto['activo'] ?></td>
                            <td>
                                <a href="<?= base_url('productos/edit/' . $producto['id_producto']); ?>" class="link-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="<?= base_url('productos/delete/' . $producto['id_producto']); ?>" class="link-dark"><i class="fa fa-archive" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay productos disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
</main>