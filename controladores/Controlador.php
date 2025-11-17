<?php
// Clase base para todos los controladores
class Controlador{

    public $accion;             // Nombre del metodo que se quiere ejecutar
    public $nombreControlador;  // Nombre de la carpeta donde esta las listas

    // Ejecutar la acción q se pidio en la URL, 
    public function llamarAccion($parametros = array()){
        $metodo = $this->accion;                // Recibe la acción
        if (method_exists($this, $metodo)) {    // Verifica si existe el metodo
            if (empty($parametros)) {           // verifica si no tiene parametros
                $this->$metodo();               // Ejecuta el método normalmente
            } else {                    
                extract($parametros);           // Si tiene parametros se los extrae y los pasa
                $this->$metodo($id);            
            }
            return true;
        } else {
            return false;
        }
    }

    // Metodo para cargar la vista y enviarla al layout principal
    public function mostrarVista($vista, $parametros = array()){
        extract($parametros, EXTR_PREFIX_SAME, "wddx");                         // Extraer parámetros
        ob_start();                                                             // Activar buffer de salida: guardar el HTML en memoria y no imprimir todavía                                          
        include "vistas/" . $this->nombreControlador . "/" . $vista . ".php";   // Incluir la vista respectiva
        $contenido = ob_get_clean();                                            // Obtener el contenido HTML del buffer y almacenarlo en la variable contenido                                        
        include "vistas/html.php";                                              // Incluir el layout general
        die();                                                                  // termina el script php
    }
}

