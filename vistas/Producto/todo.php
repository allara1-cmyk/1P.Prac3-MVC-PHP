<div class="container">
    <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                <?php
                for($i = 0; $i < count($resultados); $i++){
                    echo "<tr id='producto_" . $resultados[$i]->idProducto . "'>";
                    
                    echo "<td>" . $resultados[$i]->nombre . "</td>";
                    echo "<td>" . $resultados[$i]->precio . "</td>";
                    echo "<td>" . $resultados[$i]->cantidad . "</td>";

                    echo "<td><a href=\"/mvc/index.php/producto/actualizar?id=" 
                         . $resultados[$i]->idProducto . "\">
                         <i class='fa fa-edit'></i></a></td>";

                    echo "<td><span data-producto=\"" 
                         . $resultados[$i]->idProducto . "\">
                         <i class='fa fa-remove'></i></span></td>";

                    echo "</tr>";
                }
                ?>
                </tbody>

            </table>

            <a class="btn btn-primary" 
               href="/mvc/index.php/producto/crear">
               Crear producto
            </a>

        </div>
    </div>
</div>
