<section class="index-crud">

    <div class="container-crud-index">


        <?php if (isset($msg)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-color: green">
                <?= $msg ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    
        
        <table class="table-productos">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mensaje</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($consultas) && !empty($consulta)): ?>
                    <?php foreach ($consultas as $consulta): ?>
                        <tr>
                            <td><?= $consulta['nombre'] ?></td>
                            <td><?= $consulta['apellido'] ?></td>
                            <td><?= $consulta['email'] ?></td>
                            <td><?= $consulta['mensaje'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No hay consultas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    

</section>