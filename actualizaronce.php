 <?php  
include("class/database.class.php");
global $database;
$hello=$database->query("SELECT `idUsuario` FROM `Usuario`");
while($row = $hello->fetch_assoc()){

$id=$row['idUsuario'];

$query="UPDATE `Usuario` SET `clave` = MD5('$id') WHERE `idUsuario` = $id;";
$database->query($query);

}
?>