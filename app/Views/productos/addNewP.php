<section class="add">
    <div class="container-add">
        <div class="text-center mb-4">
            <h3>Añadir Nuevo Producto</h3>
            <p class="text-muted">Completa el formulario debajo para añadir un nuevo producto</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="<?php echo base_url('productos/store'); ?>" method="post" enctype="multipart/form-data" class="form-add" style="padding-left: 7%; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Categoría:</label>
                       <!--- <input type="text" class="form-control" name="categoria_id" placeholder="1 / 2 / 3">--->
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