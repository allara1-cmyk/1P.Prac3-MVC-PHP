<div class="container py-4">

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">

            <h3 class="fw-bold text-primary mb-4 text-center">
                Actualizar producto ID <?php echo $modelo->id ?>
            </h3>

            <?php if (isset($error) && $error): ?>
                <div class="alert alert-danger mb-3">
                    Valida los datos
                </div>
            <?php endif; ?>

            <form method="post" class="card p-4 shadow-sm">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nombre</label>
                    <input 
                        type="text" 
                        name="producto[nombre]" 
                        class="form-control" 
                        value="<?php echo $modelo->nombre ?>" 
                        placeholder="Ingresa el nombre">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Precio</label>
                    <input 
                        type="number" 
                        name="producto[precio]" 
                        class="form-control" 
                        value="<?php echo $modelo->precio ?>" 
                        placeholder="Ingresa el precio">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Cantidad</label>
                    <input 
                        type="number" 
                        name="producto[cantidad]" 
                        class="form-control" 
                        value="<?php echo $modelo->cantidad ?>" 
                        placeholder="Ingresa la cantidad">
                </div>

                <div class="d-flex justify-content-between mt-3">

                    <a href="<?php echo $GLOBALS['URL_SERVER']; ?>/index.php/producto/todo" 
                       class="btn btn-outline-secondary px-4">
                        Regresar
                    </a>

                    <button type="submit" name="Guardar" class="btn btn-primary px-4">
                        Guardar Producto
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>
