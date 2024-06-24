<section class="add">
    <div class="container-add">
        <div class="text-center mb-4">
            <h3>Añadir Nuevo Producto</h3>
            <p class="text-muted">Completa el formulario debajo para añadir un nuevo producto</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="<?php echo base_url('productos/store'); ?>" method="post" enctype="multipart/form-data" class="form-add" style="padding-left: 7%; min-width:300px;">
               
                        <!-- Mensajes de error/exito -->

                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <p><?= esc($error) ?></p>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>

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

            
            
            
            
            
            <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Categoría:</label>
                       <select name="categoria_id">
                        <option value="1">Urnas</option>
                        <option value="2">Fotografia</option>
                        <option value="3">Joyería</option>
                       </select>
                    </div>

                    <div class="col">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="">
                    </div>

                    <div class="col">
                        <label class="form-label">Descripción:</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="">
                    </div>

                    <div class="col">
                        <label class="form-label">Precio:</label>
                        <input type="number" class="form-control" name="precio" placeholder="$0000.00">
                    </div>

                    <div class="col">
                        <label class="form-label">Precio de Venta:</label>
                        <input type="number" class="form-control" name="precio_vta" placeholder="$0000.00">
                    </div>

                    <div class="col">
                        <label class="form-label">Stock:</label>
                        <input type="text" class="form-control" name="stock" placeholder="0">
                    </div>

                    <div class="col">
                        <label class="form-label">Stock Mínimo:</label>
                        <input type="text" class="form-control" name="stock_min" placeholder="0">
                    </div>

                    <div class="col">
                        <label class="form-label">Subir Imagen:</label>
                        <input type="file" class="form-control" name="imagen" accept="image/*">
                    </div>

                </div>


            

                <div>
                    <button type="submit" class="btn-guardar" name="submit">Guardar</button>
                    <button class="btn-cancelar" type="button" onclick="window.location.href='<?php echo base_url('productos'); ?>'">Cancelar</button>

                </div>
            </form>
        </div>
    </div>
</section>