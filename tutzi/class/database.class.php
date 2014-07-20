<?php
/**
 * Database.php
 *
 * Esta clase esta echa para facilitar toda la comunicacion a la base de datos. Aqui se incluiran clases
 * para editar, insertar, y editar clases.
 */
// incluir archivo con todas las variables necesarias
include ($nivel_dir . "config/conf.php");
class MySQLDB
//Inicio de clase
{
    var $connection; //La conexion a la base de datos
    /* constructor */
    function MySQLDB() {
        /* Crear la conexion a la base de datos */
        $this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if ($this->connection->connect_errno > 0) {
            die('Unable to connect to database [' . $this->connection->connect_error . ']');
        }
    }
    //Funcion para mandar queries de cualquier parte solo mandar a yamar $database->query("su query");
    function query($query) {
        global $database;
        //echo $query;
        $result = $this->connection->query($query);
        //    $dbarray = mysql_fetch_array($result);
        return $result;
    }
    //funcion para seleccionar toda la informacion de una tabla, regresa un array con toda la informacion
    function selectAll($table) {
        global $database;
        //echo $query;
        $q = ("SELECT * FROM `" . $table . "`");
        //echo $q;
        $result = $this->connection->query($q);
        //$dbarray = mysql_fetch_array($result);
        return $result;
    }
    // Esta funcion selecciona la informacion de un campo especifico. regresa un array
    function selectField($table, $field, $id) {
        global $database;
        //echo $query;
        $q = ("SELECT * FROM `" . $table . "` WHERE `" . $field . "` = '" . $id . "'");
        //echo $q;
        $result = $this->connection->query($q);
        return $result;
    }
    //Funcion para convertir el resultado de un query a un array.
    function toArray($data) {
        global $database;
        while ($rows[] = $data->fetch_assoc());
        array_pop($rows);
        return $rows;
    }
    //Esta funcion borra un campo especificandole la tabla el nombre del campo y  el identificador.
    function deleteField($table, $field_name, $id) {
        global $database;
        $query = ("DELETE FROM " . $table . "WHERE " . $field_name . " = '" . $id . "'");
        $result = $this->connection->query($query);
        return $result;
    }
    function updateField($table, $field, $value, $field2, $id) {
        $q = "UPDATE " . $table . " SET " . $field . " = '$value' WHERE $field2 = '$id'";
        return $this->connection->query($q);
    }
    function insertValues($table, $values) {
        //"INSERT INTO ".TBL_USERS." VALUES ('$username', '$password', '0', $ulevel, '$email', $time)"
        $q = "INSERT INTO `" . $table . "` VALUES" . $values . ";";
        // echo $q;
        return $this->connection->query($q);
    }
};
/* Crear conexion a base de datos */
$database = new MySQLDB;
?>