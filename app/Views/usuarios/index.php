<main class="index-usuarios">
    <div class="container-crud-usuarios">


        <?php if (isset($msg)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $msg ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <!---<a href="<?= base_url('usuarios/create'); ?>" class="btn-crud">Añadir Nuevo</a>--->
        <button class="btn-crud" onclick="window.location.href='<?php echo base_url('usuarios/create'); ?>'">Añadir Nuevo</button>
        
        <table id="myTable" class="table-usuarios">
            <thead class="thead-usuarios">
                <tr class="tr-usuarios">
                    <th class="th-usuarios">ID</th>
                    <th class="th-usuarios">Nombre</th>
                    <th class="th-usuarios">Apellido</th>
                    <th class="th-usuarios">Email</th>
                    <th class="th-usuarios">Dirección</th>
                    <th class="th-usuarios">Baja</th>
                    <th class="th-usuarios">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($usuarios) && !empty($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr class="tr-usuarios">
                            <td class="td-usuarios"><?= $usuario['id_usuario'] ?></td>
                            <td class="td-usuarios"><?= $usuario['nombre'] ?></td>
                            <td class="td-usuarios"><?= $usuario['apellido'] ?></td>
                            <td class="td-usuarios"><?= $usuario['email'] ?></td>
                            <td class="td-usuarios"><?= $usuario['domicilio'] ?></td>
                            <td class="td-usuarios"><?= $usuario['baja'] ?></td>
                            <td class="td-usuarios">
                                <a href="<?= base_url('usuarios/edit/' . $usuario['id_usuario']); ?>" class="link-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="<?= base_url('usuarios/delete/' . $usuario['id_usuario']); ?>" class="link-dark"><i class="fa fa-archive" aria-hidden="true"></i>
                                </i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="tr-usuarios">
                        <td  class="td-usuarios"colspan="6">No hay usuarios disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>