<section class="index-crud">

    
    <div class="container-crud-index">


        <?php if (isset($msg)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $msg ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <!---<a href="<?= base_url('usuarios/create'); ?>" class="btn-crud">Añadir Nuevo</a>--->
        <button class="btn-crud" onclick="window.location.href='<?php echo base_url('usuarios/create'); ?>'">Añadir Nuevo</button>
        
        <table id="myTable" class="table-usuarios">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Baja</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($usuarios) && !empty($usuarios)): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= $usuario['id_usuario'] ?></td>
                            <td><?= $usuario['nombre'] ?></td>
                            <td><?= $usuario['apellido'] ?></td>
                            <td><?= $usuario['email'] ?></td>
                            <td><?= $usuario['domicilio'] ?></td>
                            <td><?= $usuario['baja'] ?></td>
                            <td>
                                <a href="<?= base_url('usuarios/edit/' . $usuario['id_usuario']); ?>" class="link-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="<?= base_url('usuarios/delete/' . $usuario['id_usuario']); ?>" class="link-dark"><i class="fa fa-archive" aria-hidden="true"></i>
                                </i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay usuarios disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>
