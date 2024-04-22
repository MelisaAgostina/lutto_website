<section class="iniciarSesion">



    <div class="wrapper">
        <form action="">

            <h1 class="titulo-login">Iniciar Sesión</h1>

            <div class="input-box">
                <input type="text" placeholder="Usuario" required>
                <box-icon name='user'></box-icon>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Contraseña" required>
                <box-icon name='lock-alt'></box-icon>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Recordarme</label>
                <a href="#">Olvidó su contraseña?</a><!---crear pag olv--->
            </div>


            <button type="submit" class="btn">Entrar</button><!---añadir href luego--->

            <div class="register-link">
                <p class="register-text">Aún no tiene una cuenta? <?php echo anchor('registrarse', 'Registrarse') ?></p>
            </div>

        </form>
    </div>

</section>