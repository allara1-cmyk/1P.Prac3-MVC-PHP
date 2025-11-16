<h3>Crear producto</h3>

<?php
    if (isset($error) && $error){
        echo "Valida los datos";
    }
?>

<form method="post">
    <input type="text" placeholder="nombre" 
           name="Producto[nombre]">

    <input type="number" placeholder="precio" 
           name="Producto[precio]">

    <input type="number" placeholder="cantidad" 
           name="Producto[cantidad]">

    <button type="submit" name="Guardar">Crear Producto</button>
</form>
