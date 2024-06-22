<main class="consultas">
    <div class="container-consultas">


     <!-- Mensajes de error/exito -->
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


            
        <h3 class="titulo-consultas-generales">Consultas Generales</h3>
    
        
        <table  class="table-consultas">
            <thead class="thead-consultas">
                <tr class="tr-consultas">
                    <th class="th-consultas">Nombre</th>
                    <th class="th-consultas">Email</th>
                    <th class="th-consultas">Mensaje</th>
                    <th class="th-consultas">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($consultas) && !empty($consultas)): ?>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr class="tr-consultas">
                            <td class="td-consultas"><?= $consulta['nombre'] ?></td>
                            <td class="td-consultas"><?= $consulta['email'] ?></td>
                            <td class="td-consultas"><?= $consulta['mensaje'] ?></td>
                             <td class="td-consultas">
                                <?php if ($consulta['leido'] == 1): ?>
                                  <a class="leido" href="<?php echo site_url('consultas/leido/' . $consulta['id']); ?>" style="color: black;"><i class="fa fa-solid fa-envelope-open"></i></a>
                                <?php else: ?>
                                 <a href="<?php echo site_url('consultas/noleido/' . $consulta['id']); ?>" style="color: black;"><i class="fa fa-solid fa-envelope"></i></a>
                                 <?php endif; ?>
                                 <a class="leido" href="" style="color: black;"><i class="fa fa-reply" aria-hidden="true"></i></a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="tr-consultas">
                        <td class="td-consultas" colspan="4">No hay consultas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
         
        <h3 class="titulo-consultas-generales">Consultas de Productos</h3>

        <table class="table-consultas">
            <thead class="thead-consultas">
                <tr class="tr-consultas">
                    <th class="th-consultas" scope="col">Nombre</th>
                    <th class="th-consultas" scope="col">Producto</th>
                    <th class="th-consultas" scope="col">Mensaje</th>
                    <th class="th-consultas" scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($consultasprod) && !empty($consultasprod)): ?>
                    <?php foreach ($consultasprod as $consultap): ?>
                        <tr class="tr-consultas">
                            <td class="td-consultas"><?= $consultap['nombre'] ?></td>
                            <td class="td-consultas"><?= $consultap['producto'] ?></td>
                            <td class="td-consultas"><?= $consultap['mensaje'] ?></td>
                            <td class="td-consultas">
                                <?php if ($consulta['leido'] == 1): ?>
                                  <a  href="<?php echo site_url('consultas/leido/' . $consulta['id']); ?>" style="color: black;"><i class="fa fa-solid fa-envelope-open"></i></a>
                                <?php else: ?>
                                 <a href="<?php echo site_url('consultas/noleido/' . $consulta['id']); ?>" style="color: black;"><i class="fa fa-solid fa-envelope"></i></a>
                                 <?php endif; ?>
                                 <a class="leido" href="" style="color: black;"><i class="fa fa-reply" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr class="tr-consultas">
                        <td class="td-consultas" colspan="3">No hay consultas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>