<?php
    // Clase ProductoModelo que hereda de Modelo
    class ProductoModelo extends Modelo{
        // Propieos atributos de esta clase
        public $nombreAtributos = Array("idProducto", "nombre", "cantidad", "precio");
        // Constructor
        function __construct($id = ""){
            // Inializar atributos propios
            $this -> idNombre = "idProducto";
            $this -> nombreTabla = "Producto";
            // Constructor padre de la clase modelo
            parent::__construct($id);
        }
        // Validación de precio
        function validarPrecio(){
            // El precio es un número válido y mayor que 0
            return is_numeric($this -> precio) && $this -> precio > 0;
        }
    }