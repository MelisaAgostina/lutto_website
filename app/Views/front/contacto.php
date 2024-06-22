<section class="contacto" id="contacto">

    <div class="portada-contacto">
            <img src="assets/img/contact.jpg" alt="Imagen de portada">
            <div class="cover-text">
                <h1>CONTÁCTANOS</h1>
            </div>
    </div>
       

    <div class="contenido-contacto">
        <h5 class="titulo-contacto">Contáctanos online</h5>
        <p class="texto-contacto">Si tienes alguna duda, por favor, rellena el siguiente formulario.</p>
        <p class="texto-contacto">Para <strong>consultas urgentes o para programar una recolección</strong>, por favor llámanos al 379 LUTTO (4747458)</p>
    </div>

    <div class="fila">
      
        <form action="<?php echo base_url('consultas/save'); ?>" method="post">

            <!-- Mensajes de error/exito -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: relative; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); animation: fadeIn 0.5s;">
                    <div style="display: flex; align-items: center;">
                        <div style="margin-right: 10px; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background-color: #28a745; border-radius: 50%; color: white;">
                            <i class="fas fa-check"></i>
                        </div>
                        <div style="flex-grow: 1;">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="position: absolute; top: 10px; right: 10px; background: none; border: none;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <style>
                    @keyframes fadeIn {
                        from { opacity: 0; transform: translateY(-20px); }
                        to { opacity: 1; transform: translateY(0); }
                    }
                    .btn-close {
                        font-size: 1.2rem;
                        cursor: pointer;
                    }
                    .alert-success {
                        background-color: #d4edda;
                        border-color: #c3e6cb;
                        color: #155724;
                    }
                </style>
            <?php endif; ?>


        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

            <input type="text" name="nombre" id="nombre" value="<?= old('nombre') ?>" placeholder="Nombres" class="box" required>
            <input type="text" name="apellido" id="apellido" value="<?= old('apellido') ?>" placeholder="Apellidos" class="box" required>
            <input type="text" name="email" id="email" value="<?= old('email') ?>" placeholder="Email" class="box" required>
            <textarea type="text" name="mensaje" id="mensaje" value="<?= old('mensaje') ?>" class="box" placeholder="Mensaje..." id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Enviar" class="btn">
            <button type="submit" class="btn" onclick="borrarTextArea()">Limpiar</button>
        </form>

    </div>


    <!---contenido del medio--->
    <div class="contenido-contacto">

        
        <h4 class="titulo-contacto"><strong>Teléfono: 379 LUTTO (4747458)</strong></h4>
        <h4 class="titulo-contacto"><strong>Estamos disponibles para atender tu llamada los siete días de la semana.</strong></h4>
        <h4 class="titulo-contacto"><strong>Lunes - Viernes: 7:00am - 6:00pm</strong></h4>
        <h4 class="titulo-contacto"><strong>Sábado - Dom: 8am - 6pm</strong></h4>
        <p class="texto-contacto">Nuestro amable equipo en Lutto está aquí para ayudarte a ti y a tu familia durante este momento difícil.</p>
        <p class="texto-contacto"><strong>Fuera de horario: </strong> Las recolecciones de 6:00 pm a 6:30 pm de lunes a viernes, después de la 1:00 pm los sábados y todo el día domingo y días festivos incurrirán en una pequeña tarifa después del horario de $2000.00.</p>
        
        <h2 class="titulo-contacto-oficinas">Nuestras Oficinas</h2>

</div>
        
        <div class="row row-cols-1 row-cols-md-2 g-4">
            

            <div class="col">

                <div class="card-o"
                >
                    <img src="assets/img/oficina1.png" class="card-img-top" alt="...">

                    <div class="card-body-of">
                        <h5 class="card-title-of"><strong>Oficina en Córdoba Capital</strong></h5>
                        <p class="card-text-of"><strong>Email:</strong> luttofuneraria@gmail.com</p>
                        <p class="card-text-of"><strong>Domicilio: </strong> Obispo Trejo 1131</p>
                        <p class="card-text-of"><strong>Horas de Oficina</strong></p>
                        <p class="card-text-of"><strong>Lunes - Viernes: </strong> 8.00am - 4.00pm</p>
                        <p class="card-text-of"><strong>Sábado: </strong> Solo con turno.</p>
                        <p class="card-text-of"><strong>Domingo: </strong> Cerrado.</p>
                    </div>

                </div>
                
            </div>
        

            <div class="col">

                <div class="card-o">

                    <img src="assets/img/oficina2.png" class="card-img-top" alt="...">

                    <div class="card-body-of">
                        <h5 class="card-title-of"><strong>Oficina en Scranton, Estados Unidos</strong></h5>
                        <p class="card-text-of"><strong>Email:</strong> luttofuneralservice@gmail.com</p>
                        <p class="card-text-of"><strong>Domicilio: </strong> 125 Beech St, Scranton, PA 18505</p>
                        <p class="card-text-of"><strong>Horas de Oficina</strong></p>
                        <p class="card-text-of"><strong>Lunes - Viernes: </strong> 8.00am - 4.00pm</p>
                        <p class="card-text-of"><strong>Sábado: </strong> Solo con turno.</p>
                        <p class="card-text-of"><strong>Domingo: </strong> Cerrado.</p>
                    </div>

                </div>

            </div>


        </div>
    
    <!---cierre contenido del medio--->

    
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