<?php 
// Carga la clase responsable de la conexión a la base de datos
require_once "Conexion.php";

// Clase base para todos los modelos
class Modelo {
    public $idNombre = "id";            // Nombre de la columna que representa la clave primaria
    public $atributos = [];             // Almacena los valores de este modelo 
    public $id;                         // Valor del ID del registro que se quiere consultar, actualizar o borrar
    private $nombreTabla = "producto";  // Nombre de la tabla asociada al modelo
    private $conexion;                  // Instancia de la clase Conexion

    // Constructor del modelo. Si recibe un ID, carga automáticamente ese registro.
    function __construct($id = "") {
        $this->conexion = new Conexion();                   // Crea la conexión
        $this->nombreTabla = ucfirst($this->nombreTabla);   // Convierte el nombre de la tabla en mayúscula inicia
        if ($id != "") {                                     // Si llega un ID, se guarda y se consulta el registro automáticamente
            $this->id = $id;
            $this->consultar();
        }
    }

    // Copia los valores obtenidos desde la BD dentro del Modelo
    public function setAtributos($modelo) {
        $this->atributos = $modelo;                 // Guarda el arreglo completo
        if (!empty($modelo)) {                      // Crear propiedades dinámicas con el nombre de cada columna
        foreach ($modelo as $key => $value) {   
                $this->{$key} = $value;
            }
        }
    }

     // Valida que los atributos NO estén vacíos
    public function validar() {
        $noError = true;
         // Recorre cada atributo del modelo
        foreach ($this->atributos as $key => $value) {
            if (empty($value)) {             // Si algún valor está vacío, marca error
                $noError = false;
            }
        }
        return $noError;
    }

     // Inserta un nuevo registro en la tabla
    public function insertar() {
        $campos = implode(",", $this->nombreAtributos);     // Convierte el array de nombres de columnas en texto separado por comas
        $valores = $this->valores();                        // Convierte los valores del modelo en una lista lista para SQL
        // Armado del SQL final de inserción
        $sql = "insert into {$this->nombreTabla} ({$campos}) values({$valores})";
        // Ejecuta el SQL en la BD
        $this->conexion->abrir();
        $this->conexion->ejecutar($sql);
    }

    // Actualiza un registro existente
    public function actualizar(){
        $campos = implode(",", $this->nombreAtributos);      // Convierte el array de columnas en un string
        $set = $this->valoresActualizar();                  // Crea la parte SET del UPDATE (campo='valor')
        $sql = "update {$this->nombreTabla} set ({$set}) 
                where {$this->idNombre} = $this->id";       // Armado del SQL final
        // Ejecuta el SQL
        $this->conexion->abrir();
        $this->conexion->ejecutar($sql);
    }

    // Borra un registro según su id
    public function eliminar(){
        // SQL delete con condición
        $sql = "delete from {$this->nombreTabla} where {$this->idNombre} = $this->id";

        $this->conexion->abrir();
        $this->conexion->ejecutar($sql);
    }

    // Consulta un registro específico según id
    public function consultar() {
        // Convierte el array de nombres de columnas en texto para el SELECT
        $campos = implode(",", $this->nombreAtributos);
        // SQL para buscar una sola fila según el ID del modelo
        $sql = "select {$campos} from {$this->nombreTabla} 
                where {$this->idNombre} = '" . $this->id . "'";
        // Ejecuta el SQL
        $this->conexion->abrir();
        $this->conexion->ejecutar($sql);
        // Toma la fila resultante y la copia dentro del objeto
        $this->setAtributos($this->conexion->extraerModelo());
    }

    // Consulta todos los registros de la tabla y los devuelve como objetos Modelo
    public function consultarTodo() {
        // Convierte el array de columnas en un string
        $campos = implode(",", $this->nombreAtributos);
        // SQL para obtener todos los datos de una tabla
        $sql = "select {$campos} from {$this->nombreTabla}";
        // Ejecuta el SQL
        $this->conexion->abrir();
        $this->conexion->ejecutar($sql);
        // Obtener el total de filas 
        $filas = $this->conexion->numFilas();
        // Array para guardar los objetos
        $registros = array();
        // Por cada fila, crear un objeto y llenarlo
        for ($i = 0; $i < $filas; $i++) {
            $datos = $this->conexion->extraerModelo();  // Devuelve las filas comenzando por la 1
            $registros[$i] = new self;                  // Crear nuevo objeto
            $registros[$i]->setAtributos($datos);       // llenar atributos
        }
        // Retornar el arreglo
        return $registros;
    }

    // Construir los valores para actualizar datos
    private function valoresActualizar(){
        $valores = array();
        // Recorre atributos como arreglo asociativo
        foreach ($this->atributos as $nombre => $value) {
            // Crea claves = valores
            $valores[] = "$nombre = '" . $value . "'";
        }
        // Crea cadena de caracteres separados por comas
        return implode(",", $valores);
    }

    // Declarar los valores para insertar datos
    private function valores(){
        $valores = Array();
        foreach ($this->atributos as $key => $value) {
            $valores[] = "'$value'";
        }
        // Devulve valores separados por comas
        return implode(",", $valores);
    }
}