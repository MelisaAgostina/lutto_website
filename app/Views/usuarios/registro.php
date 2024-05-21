<section class="registro">

    <div class="wrapper-reg">

    <?php $validation = \Config\Services::validation(); ?>

        <form method="post" action="<?php echo base_url('/enviar-form') ?>">

            <!------>
            <?php if(!empty (session()->getFlashdata('fail'))):?>
     	    <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
            <?php endif?>
            <?php if(!empty (session()->getFlashdata('success'))):?>
     	    <div class="alert alert-danger"><?=session()->getFlashdata('success');?></div>
            <?php endif?>



            <h1 class="titulo-reg">Cree una Cuenta</h1>


            <div class="input-box">

                <input type="text" name="nombre" placeholder="Nombres*" required>

                <!-- Error -->
                 <?php if($validation->getError('nombre')) {?>
                 <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('nombre'); ?>
                 </div>
                 <?php }?>

            </div>

            <div class="input-box">

                <input type="text" name="apellido" placeholder="Apellidos*" required>

                <!-- Error -->
                <?php if($validation->getError('apellido')) {?>
                <div class='alert alert-danger mt-2'>
                  <?= $error = $validation->getError('apellido'); ?>
                </div>
                <?php }?>

            </div>

            <div class="input-box">

            <input type="text" name="username" placeholder="Nombre de usuario*" required>

            <!-- Error -->
            <?php if($validation->getError('username')) {?>
            <div class='alert alert-danger mt-2'>
             <?= $error = $validation->getError('username'); ?>
            </div>
            <?php }?>

            </div>

            <div class="input-box">

                <input type="email" name="email" placeholder="Email*" required>

                 <!-- Error -->
                <?php if($validation->getError('email')) {?>
                <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('email'); ?>
                </div>
                <?php }?>
            
            </div>


            <div class="input-box">
                <input type="text" name="domicilio" placeholder="Domicilio*" required>
            </div>

            <div class="input-box">
                <input type="text" name="postal" placeholder="Código Postal*" required>
            </div>

            <div class="input-box">
                <input type="text" name="telefono" placeholder="Teléfono">
            </div>

            <div class="input-box">

                <input type="password" name="pass" placeholder="Contraseña*" required>

            <!-- Error -->
            <?php if($validation->getError('pass')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('pass'); ?>
            </div>
            <?php }?>

            </div>

         
            <div class="reg-text">
                <p class="reg-text-campos">* indica que los campos son obligatorios.</p>
            </div>

            <button type="submit" class="btn">Registrarse</button>
            <button type="submit" class="btn" onclick="borrarTextArea()">Limpiar formulario</button>
            <a style="padding-top: 1.7%" href="<?php echo base_url('registro') ?>" class="btn">Cancelar</a>


            <div class="reg-link">
                <p class="reg-text">Ya tiene cuenta? <?php echo anchor('login', 'Inicie Sesión') ?></p>
            </div>

        </form>
    </div>

    <script>
        function borrarTextArea() {
            // Obtener todos los campos de texto en el formulario
            var camposTexto = document.querySelectorAll('input[type="text"]');

            // Iterar sobre cada campo de texto y limpiar su contenido
            camposTexto.forEach(function(campo) {
                campo.value = '';
            });
        }
    </script>


</section>