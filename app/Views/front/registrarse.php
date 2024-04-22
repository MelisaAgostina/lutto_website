<section class="registrarse">



    <div class="wrapper-reg">
        <form action="">

            <h1 class="titulo-reg">Cree una Cuenta</h1>

            <div class="input-box">
                <input type="text" placeholder="Nombres*" required>
                <box-icon name='user'></box-icon>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Apellidos*" required>
                <box-icon name='user'></box-icon>
            </div>

            <div class="input-box">
                <input type="email" placeholder="Email*" required>
                <box-icon name='user'></box-icon>
            </div>


            <div class="input-box">
                <input type="text" placeholder="Domicilio*" required>
                <box-icon name='user'></box-icon>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Código Postal*" required>
                <box-icon name='user'></box-icon>
            </div>

            <div class="input-box">
                <input type="text" placeholder="Teléfono*" required>
                <box-icon name='user'></box-icon>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Contraseña*" required>
                <box-icon name='lock-alt'></box-icon>
            </div>

         
            <div class="reg-text">
                <p class="reg-text-campos">* indica que los campos son obligatorios.</p>
            </div>

            <button type="submit" class="btn">Registrarse</button><!---añadir href luego--->

            <div class="reg-link">
                <p class="reg-text">Ya tiene cuenta? <?php echo anchor('iniciarSesion', 'Inicie Sesión') ?></p>
            </div>

        </form>
    </div>

</section>