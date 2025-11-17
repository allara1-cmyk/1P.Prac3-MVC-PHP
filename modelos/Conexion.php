<?php
// Clase conexión para conectarse a MySQL, ejecutar consultas y extraer resultados.
class Conexion
{
    // Atributos privados de la propia clase
    private $mysqli;        // Guarda conexión al servidor MYSQL
    private $resultado;     // Guarda las respuestas cuando se hacen las consultas

    // Metodo que crea la conexión
    function abrir()
    {
        // Parámetros de conexión
        $this->mysqli = new mysqli("localhost", "root", "", "almacen");
        // Asigna el charset (conjunto de caracteres) a UTF-8
        $this->mysqli->set_charset("utf8");
    }

    // Método para enviar una consulta
    function ejecutar($sentencia)
    {
        // Ejecutar la sentencia enviada
        $this->resultado = $this->mysqli->query($sentencia);
    }

    // Método para cerrar la conexión
    function cerrar()
    {
        // Cerrar conexión para liberar memoria.
        $this->mysqli->close();
    }

    // Método para contar filas devolvió MySQL
    function numFilas()
    {
        // Si resultado no es nulo, devuelve el número de filas, sino devuelve 0
        return ($this->resultado != null) ? $this->resultado->num_rows : 0;
    }

    // Método para obtiene una fila
    function extraer()
    {
        // Devuelve una sola fila como arreglo asociativo
        // Cada vez que se llama extraer, pasa a la siguiente fila.
        return $this->resultado->fetch_assoc();
    }

    // Metodo para obtiener el último ID insertado
    function ultimoId()
    {
        return $this->mysqli->insert_id;
    }

    // Método para devolver último registro insertado en arreglo asosiativo
    public function extraerModelo()
    {
        // Cada vez que se llame se pasa el siguiente índice
        return $this->resultado->fetch_array(MYSQLI_ASSOC);
    }
}
?>
