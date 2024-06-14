<section class="index-crud">

    <div class="container-crud-index">


        <?php if (isset($msg)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-color: green">
                <?= $msg ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <h3 class="titulo-consultas-generales">Consultas Generales</h3>
    
        
        <table  class="table-productos">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($consultas) && !empty($consultas)): ?>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td><?= $consulta['nombre'] ?></td>
                            <td><?= $consulta['email'] ?></td>
                            <td><?= $consulta['mensaje'] ?></td>
                             <td>
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
                    <tr>
                        <td colspan="4">No hay consultas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
         
        <h3 class="titulo-consultas-generales">Consultas de Productos</h3>

        <table class="table-productos">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($consultasprod) && !empty($consultasprod)): ?>
                    <?php foreach ($consultasprod as $consultap): ?>
                        <tr>
                            <td><?= $consultap['nombre'] ?></td>
                            <td><?= $consultap['producto'] ?></td>
                            <td><?= $consultap['mensaje'] ?></td>
                            <td>
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
                    <tr>
                        <td colspan="3">No hay consultas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>