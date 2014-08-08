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

        if ($mysqli->error) {
    try {    
        throw new Exception("MySQL error $mysqli->error <br> Query:<br> $query", $msqli->errno);    
    } catch(Exception $e ) {
        echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
        echo nl2br($e->getTraceAsString());
    }
}else{
        return $result;
    }
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
        if(!$data==FALSE){
        while ($rows[] = $data->fetch_assoc());
        array_pop($rows);
        return $rows;

    }else{echo "ERROR not valid DATA!";}

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
    function exist($query){
        $result=$this->query($query);
        $nrows=$result->num_rows;
        if(!$result || $nrows < 1){
        return FALSE;
        }else if ($nrows>=1){
        return TRUE;
        }
    
    }
    function count($query){
    return $query->num_rows;
    }

    function selectSingleField($table,$field,$where,$value){
    $query='SELECT '.$field.' FROM '.$table.' WHERE '.$where.'='.$value;
    return array_values(mysqli_fetch_array($this->query($query)))[0];
    }
    function singleField($query){
    return array_values(mysqli_fetch_array($this->query($query)))[0];

    }
    function toMysqlDate($date){
    return date('Y-m-d', strtotime($date));
    }

    
    //$age=array("Nombre"=>"Daniel","A_Paterno"=>"Lozano","A_Materno"=>"Carrillo");
    function insertxArray($array,$table){//!!NO PROVADO O TERMINADO!!!!
    global $database;
    $query="INSERT INTO $table";
    //INSERT INTO tbl_name (col1,col2) VALUES(15,col1*2);

    $fields="(";
    $values="(";

    foreach ($array as $key => $value) {

    $fields=$fields.$key.",";
    $values=$values.$value.",";

    
        # code...
    }
    //$database->query("");


    }
};
/* Crear conexion a base de datos */
$database = new MySQLDB;
?>