<section class="footer">
    <!-- Creamos la var session -->
    <?php
    $session = session();
    $logged_in = $session->get('logged_in');
    ?>

    <?php if ($logged_in == 1): ?>
        <div class="box-container-footer">

            <div class="box-footer">
                <img src="assets/img/logo.png" alt="">
            </div>

            <div class="box-footer">
                <h3 class="titulo-box-footer">Quick links</h3>
                <?php echo anchor('productos', 'Productos') ?>
                <?php echo anchor('index', 'Inicio') ?>
                <?php echo anchor('faq', 'Dudas Frecuentes') ?>
                <?php echo anchor('contacto', 'Contacto') ?>
            </div>

            <div class="box-footer">
                <h3 class="titulo-box-footer">Contáctanos</h3>
                <p class="footer-text"><strong>Teléfono:</strong> 379 4747458</p>
                <p class="footer-text"><strong>Email:</strong> luttofuneraria@gmail.com</p>
            </div>

            <div class="box-footer">
                <h3 class="titulo-box-footer">Legal</h3>
                <?php echo anchor('privacidad', 'Privacidad') ?>
                <?php echo anchor('terminos', 'Términos y Usos') ?>
            </div>
        </div>

        <div class="creditos">Copyright © 2024 Lutto. Todos los derechos reservados.</div>
    <?php else: ?>
        <div class="box-container-footer">

            <div class="box-footer">
                <img src="assets/img/logo.png" alt="">
            </div>

            <div class="box-footer">
                <h3 class="titulo-box-footer">Quick links</h3>
                <?php echo anchor('productos', 'Productos') ?>
                <?php echo anchor('login', 'Iniciar Sesión') ?>
                <?php echo anchor('index', 'Inicio') ?>
                <?php echo anchor('faq', 'Dudas Frecuentes') ?>
                <?php echo anchor('contacto', 'Contacto') ?>
            </div>

            <div class="box-footer">
                <h3 class="titulo-box-footer">Contáctanos</h3>
                <p class="footer-text"><strong>Teléfono:</strong> 379 4747458</p>
                <p class="footer-text"><strong>Email:</strong> luttofuneraria@gmail.com</p>
            </div>

            <div class="box-footer">
                <h3 class="titulo-box-footer">Legal</h3>
                <?php echo anchor('privacidad', 'Privacidad') ?>
                <?php echo anchor('terminos', 'Términos y Usos') ?>
            </div>
        </div>

        <div class="creditos">Copyright © 2024 Lutto. Todos los derechos reservados.</div>
    <?php endif; ?>
</section>
<!---FOOTER--->


</body>
</html>