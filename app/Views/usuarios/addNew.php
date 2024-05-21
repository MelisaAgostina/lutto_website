<section>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Añadir Nuevo Usuario</h3>
            <p class="text-muted">Completa el formulario debajo para añadir un nuevo usuario</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="<?php echo base_url('usuarios/store'); ?>" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Albert">
                    </div>

                    <div class="col">
                        <label class="form-label">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Einstein">
                    </div>

                    <div class="col">
                        <label class="form-label">Nombre de Usuario:</label>
                        <input type="text" class="form-control" name="username" placeholder="">
                    </div>

                    <div class="col">
                        <label class="form-label">Domicilio:</label>
                        <input type="text" class="form-control" name="domicilio" placeholder="Einstein">
                    </div>

                    <div class="col">
                        <label class="form-label">Código Postal:</label>
                        <input type="text" class="form-control" name="postal" placeholder="Einstein">
                    </div>

                    <div class="col">
                        <label class="form-label">Telefóno:</label>
                        <input type="text" class="form-control" name="telefono" placeholder="Einstein">
                    </div>

                    <div class="col">
                        <label class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="pass" placeholder="Einstein">
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                </div>

            

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Guardar</button>
                    <a href="<?php echo base_url('usuarios'); ?>" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</section>
