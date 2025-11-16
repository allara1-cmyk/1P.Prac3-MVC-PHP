<?php
class ProductoModelo extends Modelo {
    public $nombreAtributos = Array("idProducto", "nombre", "cantidad", "precio");

    function __construct($id = "") {
        $this->idNombre = "idProducto";
        $this->nombreTabla = "Producto";
        parent::__construct($id);
    }

    function validarPrecio() {
        return is_numeric($this->precio) && $this->precio > 0;
    }
}
