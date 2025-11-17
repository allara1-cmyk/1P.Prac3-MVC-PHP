<div class="container py-4">

    <!-- Botón regresar -->
    <div class="row mb-3">
        <div class="col-12 col-lg-8 offset-lg-2">
            <a href="<?php echo $GLOBALS['URL_SERVER']; ?>/index.php/inicio"
        class="btn btn-outline-secondary">
            Regresar
        </a>

        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12 col-lg-8 offset-lg-2 text-center">
            <h2 class="fw-bold text-primary">Listado de Productos</h2>
            <p class="text-muted">Administración del inventario del almacén</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">

            <table class="table table-striped table-hover align-middle shadow-sm">
                <thead class="table-primary">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th class="text-center">Actualizar</th>
                        <th class="text-center">Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < count($resultados); $i++) {
                        echo '<tr id="producto_' . $resultados[$i]->idProducto . '">';
                        echo '<td>' . $resultados[$i]->nombre . '</td>';
                        echo '<td>' . $resultados[$i]->precio . '</td>';
                        echo '<td>' . $resultados[$i]->cantidad . '</td>';

                        echo '<td class="text-center">
                                <a class="text-warning" href="/mvc_php/index.php/producto/actualizar?id=' . $resultados[$i]->idProducto . '">
                                    <i class="fa fa-edit"></i>
                                </a>
                              </td>';

                        echo '<td class="text-center">
                                <span class="remover-producto text-danger" data-producto="' . $resultados[$i]->idProducto . '" style="cursor:pointer">
                                    <i class="fa fa-times"></i>
                                </span>
                              </td>';

                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-3">
                <a class="btn btn-primary" href="/mvc_php/index.php/producto/crear">
                    Crear producto
                </a>

                <span class="text-muted small">
                    Total productos: <?php echo count($resultados); ?>
                </span>
            </div>

        </div>
    </div>
</div>
