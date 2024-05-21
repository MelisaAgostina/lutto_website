<section class="login">



    <div class="wrapper">
        <form method="post" action="<?php echo base_url('/login/auth') ?>">

            <h1 class="titulo-login">Iniciar Sesión</h1>

            <!-- Mensaje de Error -->
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-warning">
                    <?= session()->getFlashdata('msg')?>
                </div>
            <?php endif;?>


            <div class="input-box">
                <input name="username" type="text" class="form-control" placeholder="Usuario" required>
            </div>

            <div class="input-box">
                <input name="pass" type="password"  class="form-control" placeholder="Contraseña" required>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Recordarme</label>
                <a href="#">Olvidó su contraseña?</a><!---crear pag olv--->
            </div>


            <button type="submit" class="btn">Entrar</button>

            <div class="register-link">
                <p class="register-text">Aún no tiene una cuenta? <?php echo anchor('registro', 'Registrarse') ?></p>

    </div>

</section>