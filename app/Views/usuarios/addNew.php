<section class="add">
    <div class="container-add">
        <div class="text-center mb-4">
            <h3>Añadir Nuevo Usuario</h3>
            <p class="text-muted">Completa el formulario debajo para añadir un nuevo usuario</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="<?php echo base_url('usuarios/store'); ?>" method="post" class="form-add" style="padding-left: 7%; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Jon">
                    </div>

                    <div class="col">
                        <label class="form-label">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" placeholder="Snow">
                    </div>

                    <div class="col">
                        <label class="form-label">Nombre de Usuario:</label>
                        <input type="text" class="form-control" name="username" placeholder="Lord Commander">
                    </div>

                    <div class="col">
                        <label class="form-label">Domicilio:</label>
                        <input type="text" class="form-control" name="domicilio" placeholder="Winterfell">
                    </div>

                    <div class="col">
                        <label class="form-label">Código Postal:</label>
                        <input type="text" class="form-control" name="postal" placeholder="123">
                    </div>

                    <div class="col">
                        <label class="form-label">Telefóno:</label>
                        <input type="text" class="form-control" name="telefono" placeholder="123456">
                    </div>

                    <div class="col">
                        <label class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="pass" placeholder="123456">
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" style="width: 28.8vw" class="form-control" name="email" placeholder="jon@snow.com">
                    </div>

                </div>


            

                <div>
                    <button type="submit" class="btn-guardar" name="submit">Guardar</button>
                    <button class="btn-cancelar" type="button" onclick="window.location.href='<?php echo base_url('usuarios'); ?>'">Cancelar</button>

                </div>
            </form>
        </div>
    </div>
</section>