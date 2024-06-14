<section class="index-crud">

    
    <div class="container-crud-index">


        <?php if (isset($msg)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $msg ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <!---<a href="<?= base_url('productos/create'); ?>" class="btn-crud">Añadir Nuevo</a>--->
        <button class="btn-crud" onclick="window.location.href='<?php echo base_url('productos/create'); ?>'">Añadir Nuevo</button>
        
        <table id="myTable" class="table-productos">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Categoría</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio de Venta</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($productos) && !empty($productos)): ?>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?= $producto['categoria_id'] ?></td>
                            <td><?= $producto['nombre'] ?></td>
                            <td><?php echo '$' . $producto['precio_vta']; ?></td>
                            <td><?= $producto['stock'] ?></td>
                            <td>                   
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

    
</section>