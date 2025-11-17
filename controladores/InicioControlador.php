<?php
// Controlador especifico que hereda de class Controlador
class InicioControlador extends Controlador {
    // Metodo propio 
    function home(){
        // Carga la vista home dentro del directorio inicio
        $this->mostrarVista("home", $_GET);
    }
}