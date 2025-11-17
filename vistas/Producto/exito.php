<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">

            <div class="card shadow-sm text-center p-4">

                <!-- Ícono de éxito -->
                <div class="mb-3">
                    <i class="bi bi-check-circle-fill text-success fs-1"></i>
                </div>

                <h3 class="fw-bold text-success mb-2">Datos cargados con éxito</h3>
                <p class="text-muted mb-4">La operación se realizó correctamente.</p>

                <div class="d-flex justify-content-center gap-2">
                    <a href="<?php echo $GLOBALS['URL_SERVER']; ?>/index.php/producto/todo" 
                       class="btn btn-primary px-4">
                        Ver productos
                    </a>

                    <a href="<?php echo $GLOBALS['URL_SERVER']; ?>/index.php/producto/crear" 
                       class="btn btn-outline-success px-4">
                        Crear nuevo
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>
