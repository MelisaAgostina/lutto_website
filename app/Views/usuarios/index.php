<main class="index-usuarios">
    <div class="container-crud-usuarios">

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