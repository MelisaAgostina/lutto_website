<section>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Editar Información del Usuario</h3>
            <p class="text-muted">Haga click en 'Guardar' para salvar los cambios.</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="<?php echo base_url('usuarios/update/' . $usuario['id_usuario']); ?>" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $usuario['nombre']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" value="<?php echo $usuario['apellido']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Nombre de Usuario:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $usuario['username']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Domicilio:</label>
                        <input type="text" class="form-control" name="domicilio" value="<?php echo $usuario['domicilio']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Codigo Postal:</label>
                        <input type="text" class="form-control" name="postal" value="<?php echo $usuario['postal']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $usuario['telefono']; ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $usuario['email']; ?>">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Guardar</button>
                    <a href="<?php echo base_url('usuarios'); ?>" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</section>
