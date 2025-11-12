<?php
class InicioControlador extends Controlador {
    public function home() {
        $this->mostrarVista("home", $_GET);
    }
}