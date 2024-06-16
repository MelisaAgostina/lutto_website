<main class="consultas">
    <div class="container-consultas">


        <?php if (isset($msg)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-color: green">
                <?= $msg ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
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