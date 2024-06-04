<section class="edit">
    <div class="container-edit">
        <div class="text-center mb-4">
            <h3>Editar Información del Producto</h3>
            <p class="text-muted">Haga click en 'Guardar' para salvar los cambios.</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="<?php echo base_url('productos/update/' . $producto['id_producto']); ?>" method="post"  enctype="multipart/form-data" class="form-edit" style="padding-left: 7%; min-width:300px;">
                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $producto['nombre']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Descripcion:</label>
                        <input type="text" class="form-control" name="descripcion" value="<?php echo $producto['descripcion']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Precio:</label>
                        <input type="number" class="form-control" name="precio" value="<?php echo $producto['precio']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Precio de Venta:</label>
                        <input type="number" class="form-control" name="precio_vta" value="<?php echo $producto['precio_vta']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Stock:</label>
                        <input type="text" class="form-control" name="stock" value="<?php echo $producto['stock']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Stock Mínimo:</label>
                        <input type="text" class="form-control" name="stock_min" value="<?php echo $producto['stock_min']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Subir Imagen:</label>
                        <input type="file" class="form-control" name="imagen" accept="image/*">
                    </div>

                    
                    <!--- Opción para reactivar el producto --->
                    <?php if ($producto['activo'] == 'NO'): ?>
                        <div class="reactivar-user">
                            <label class="form-label">Este producto se encuentra dado de baja ¿Desea reactivarlo?</label>
                            <input type="radio" name="activo" class="form-control-circle" value="NO">
                        </div>
                    <?php endif; ?>

                </div>


                <div>
                    <button type="submit" class="btn-guardar" name="submit">Guardar</button>
                    <button href="<?php echo base_url('usuarios'); ?>" class="btn-cancelar">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</section>
