<?php
/**
 * Editar.php
 * Esta vista es para editar los diferentes, catalogos, recibe variables GET del url y las manda al controlador.
 * primero busca acciones y luego tipo.
 */
//Si aun no se define nivel dir definirlo a este directorio.
if(!isset($nivel_dir)){
$nivel_dir="../";	
}
//incluir controlador.
include ($nivel_dir."controller/editar.controller.php");
//variable global del controlador
global $editar_controller;
//Content goes here....
//si existe la variable accion, mandarla al controlador y imprimir el resultado
if(isset($_GET['accion'])){
echo $editar_controller->cargarAccion($_GET['accion'],$_GET['id']);

}

//si existe la variable tipo, mandarla al controlador y imprimir el resultado
if(isset($_GET['tipo'])){
echo $editar_controller->cargarPagina($_GET['tipo']);
}




?>