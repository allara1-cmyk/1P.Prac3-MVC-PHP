<h3>Actuallizar producto ID <?php echo $modelo -> id ?></h3>
<?php
if (isset($error) && $error){
    echo "valida los datos";
}
?>
<form method="post">
    <input type="text" value="<?php echo $modelo -> nombre ?>" placeholder="nombre" name="producto[nombre]">
    <input type="number" value="<?php echo $modelo -> precio ?>" placeholder="precio" name="producto[precio]">
    <input type="number" value="<?php echo $modelo -> cantidad ?>" placeholder="cantidad" name="producto[cantidad]">
    <button type="submit" name="Guardar">Guardar Producto</button>
</form>