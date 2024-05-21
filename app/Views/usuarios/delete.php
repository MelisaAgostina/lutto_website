<section>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Eliminar Usuario</h3>
            <p class="text-muted">¿Está seguro de que desea eliminar este usuario?</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="<?php echo base_url('usuarios/delete/' . $usuario['id_usuario']); ?>" method="post">
                <div class="mb-3">
                    <p><strong>Nombre:</strong> <?php echo $usuario['nombre']; ?></p>
                    <p><strong>Apellido:</strong> <?php echo $usuario['apellido']; ?></p>
                    <p><strong>Email:</strong> <?php echo $usuario['email']; ?></p>
                    <!-- Agregar otros campos según sea necesario -->
                </div>

                <div class="mb-3">
                    <p class="text-danger">¡Esta acción no se puede deshacer!</p>
                </div>

                <div>
                    <button type="submit" class="btn btn-danger" name="submit">Confirmar Eliminación</button>
                    <a href="<?php echo base_url('usuarios'); ?>" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</section>
