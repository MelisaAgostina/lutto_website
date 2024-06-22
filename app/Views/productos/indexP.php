<main class="index-crud">
    <div class="container-crud-index">

    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: relative; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); animation: fadeIn 0.5s;">
        <div style="display: flex; align-items: center;">
            <div style="margin-right: 10px; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #28a745; border-radius: 50%; color: white;">
                <i class="fas fa-check"></i>
            </div>
            <div style="flex-grow: 1;">
                <?= session()->getFlashdata('success') ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="position: absolute; top: 10px; right: 10px; background: none; border: none;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .btn-close {
            font-size: 1.2rem;
            cursor: pointer;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
    </style>
    <?php endif; ?>


        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
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