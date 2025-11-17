<h3>Crear producto</h3>
<?php
if (isset($error) && $error){
    echo "valida los datos";
}
?>
<form method="post">
    <input type="text" placeholder="nombre" name="producto[nombre]">
    <input type="number" placeholder="precio" name="producto[precio]">
    <input type="number" placeholder="cantidad" name="producto[cantidad]">
    <button type="submit" name="Guardar">Crear Producto</button>
</form>