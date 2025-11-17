<?php
require_once __DIR__ . '/../modelos/ProductoModelo.php';                    // Llamma a la clase productomodelo solo una vez
class ProductoControlador extends Controlador{
    // Cada funcion representa una URL
    function crear(){
        $modelo = new ProductoModelo();                                 // Instancia de clase productoModelo
        if (isset($_POST["producto"]) && !empty($_POST["producto"])) {  // Comprobar si lego un formulario por POST y no esta vacio
            $modelo->setAtributos($_POST["producto"]);                  // Copiar los datos del POST al modelo   
            if ($modelo->validar()) {                                   // devuelve true si esta correctamente validado
                $modelo->insertar();                                    // inserta los datos 
                $this->mostrarVista("exito");                           // muestra la vista exito.php
                return; 
            } else {
                $this->mostrarVista("crear", array("modelo" => true));  // si hay error, mostrar la vista crear pero con error
                return;
            }
        }
        $this->mostrarVista("crear");                                   // Si no hay POST solo muestra la vista del formulario
    }

    // fucnion para actualizar 
    function actualizar($id){                                                                                      
        $modelo = new ProductoModelo($id);                                 // Instancia de clase productoModelo pasando id: automáticamente carga el producto desde la base de datos
        if (isset($_POST["producto"]) && !empty($_POST["producto"])) {     // Comprobar si lego un formulario por POST y no esta vacio
            $modelo->setAtributos($_POST["producto"]);                     // Insertar los atributos de POST
            if ($modelo->validar()) {                                      // devuelve true si esta correctamente validado                                  
                $modelo->actualizar();                                     // Actulizar y mostrar vista
                $this->mostrarVista("exito");
            } else {
                $this->mostrarVista("actualizar", array("modelo" => $modelo , "error" => true)); // si hay error, mostrar la vista actualizar pero con error
            }
        }
        if (!empty($modelo -> atributos)){                                 // si no hay POST pero el modelo existe, mostrar le formulario
            $this -> mostrarVista("actualizar", array("modelo" => $modelo));
        } else {
            echo "no existe el producto";                                  // Si no existe ID mandar mensaje
        }
    }

    // Carga todos los productos
    function todo(){                                        
        $modelo = new ProductoModelo();                                     // Instancia de clase productoModelo pasando id: automáticamente carga el producto desde la base de datos
        $this -> mostrarVista("todo", array("resultados" => $modelo -> consultarTodo()));   // mostrar la vista llamada todo.php y enviarle la variable resultados q es un array
    }

    // Eliminar por id
    function eliminar($id){                                                 
        $modelo = new ProductoModelo($id);                              // Instancia de clase productoModelo pasando id: automáticamente carga el producto desde la base de datos                                                
        if (!empty($modelo -> atributos)){                              // Verificar si el producto existe                                                 
            $modelo -> eliminar();                                      // Si existe lo elimina
            exit(json_encode(array("ok" => "producto eliminado")));     // Devuelve json con la respuesta existosa
        } else {                                                            
            exit(json_encode(array("error" => "no existe el producto")));// Devuelve json con la respuesta erronea
        }
    }
}
