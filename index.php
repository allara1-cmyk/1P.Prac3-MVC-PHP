<?php
$GLOBALS["URL_SERVER"] = "http://localhost/mvc_php";
// Incluye una vez Controlador y Modelo
include_once 'controladores/Controlador.php';
include_once 'modelos/Modelo.php';


if ($_SERVER["REQUEST_URI"] != null) {                                              // Verifica si existe la URI
    // ruta del servidor
    $URL_SERVER = explode("index.php/", $_SERVER["REQUEST_URI"])[0];                // dividir la URl, elimina todo despues de index.php para obtener urta basae

    // obtener el controlador desde la URL
    $recursos = explode(".php/", $_SERVER["REQUEST_URI"]);                          // Obtener controlador de la URL
    $recursos = explode("/", isset($recursos[1]) ? $recursos[1] : $recursos[0]);    // Obtener acción de la URL

    $accion = "";                                                   
    $recursos[1] = (isset($recursos[1])) ? $recursos[1] : "home";                   // Si no hay accion definida usar home
    if (!empty($_GET)) {                                                            // Si hay variables get quitarl cualquier ?param del recurso
        $recursos[1] = explode("?", $recursos[1])[0];                                                   
    }
    $accion = $recursos[1];                                                         

    // nombre del controlador
    $nombre = (isset($recursos[0])) ? $recursos[0] : "inicio";                      // Obtener el nombre del controlador
    $nombre = ucfirst($nombre);                                                     // Primer letra mayuscula
    require_once "controladores/{$nombre}Controlador.php";                          // Carga el archivo del controlador
    $tipo = $nombre . "Controlador";                                                // Dar nombre al controlador    

    // crear controlador
    $controlador = new $tipo;                                                       // Instancia el controlador
    $controlador -> accion = $accion;                                               // Asignar acción y nombre del controlador
    $controlador -> nombreControlador = $nombre;                                    
    
    // enviar parametros al controlador
    $parametros = (!empty($_GET)) ? $_GET : Array();                                // Si hay parámetros GET, se los paso al controlador           
    $llamado = $controlador -> llamarAccion($parametros);                           // Llamar a la acción, método del controlador
    if (!$llamado) {                                                                // Si no se encuentra la ruta muestra error
        echo "Ruta no encontrada.";
    }   
} 
else {  
    echo "No hay ruta valida.";                                                     // Si no hay REQUEST_URI, mostrar error
}
