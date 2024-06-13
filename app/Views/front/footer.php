<section class="footer">
    <!-- Creamos la var session -->
    <?php
    $session = session();
    $logged_in = $session->get('logged_in');
    ?>

    <?php if ($logged_in == 1): ?>
        <div class="box-container-footer">

            <div class="box-footer">
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="">
            </div>

            <div class="box-footer">
                <h3 class="titulo-box-footer">Quick links</h3>
                <?php echo anchor('productos_v', 'Productos') ?>
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
                <img src="<?= base_url('assets/img/logo.png') ?>" alt="">
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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
      $(document).ready(function() {
          $('#myTable').DataTable({
            autoWidth: false,
        columnDefs: [
            { width: '15%', targets: 0 },
            { width: '20%', targets: 1 },
            { width: '10%', targets: 2 },
            { width: '10%', targets: 3 },
            { width: '15%', targets: 4 },
            { width: '10%', targets: 5 },
            { width: '20%', targets: 6 }
        ],
        lengthMenu: [5, 10, 25, 50],
              language: {
                  "decimal": "",
                  "emptyTable": "No hay datos disponibles en la tabla",
                  "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                  "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                  "infoFiltered": "(filtrado de _MAX_ registros totales)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Mostrar _MENU_ registros",
                  "loadingRecords": "Cargando...",
                  "processing": "Procesando...",
                  "search": "Buscar:",
                  "zeroRecords": "No se encontraron registros coincidentes",
                  "paginate": {
                      "first": "Primero",
                      "last": "Último",
                      "next": "Siguiente",
                      "previous": "Anterior"
                  },
                  "aria": {
                      "sortAscending": ": activar para ordenar la columna ascendente",
                      "sortDescending": ": activar para ordenar la columna descendente"
                  }
              }
          });
      });
</script>

</body>
</html>