<?php 
include_once ("models/encuesta.model.php");
include_once ("tutzi/class/template.class.php");

//contenido

global $encuesta;
global $template;
$disponible=$encuesta->disponible();
if($disponible==1){

echo "Gracias por contestar la encuesta.";
}
else{
$string1 = "Bienvenido ". $encuesta->nombre."<br>";
echo $template->mostrarAdvertencia("exito", $string1);

echo "Tiene: ". $encuesta->materias." Materias";


$rows= $encuesta->getCategorias();
foreach ( $rows as $cate ) {



    echo $no_catm=$cate['NombreCategoria'];
    echo ", " .$idCate=$cate['id_Categoria']."<br>";


}



}
?>




<?php
?>