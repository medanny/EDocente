<?php
/**
 * index.php
 *
 * El index esta encargado de recibir todo el trafico, del sistema, y redireccionarlo a sus devidos
 * controladores. Incluye toda la parte principal del template, para llamar a las diferentes paginas.
 */

$nivel_dir=""; //Identificador de directorio.
include ($nivel_dir."tutzi/class/template.class.php");//include de en constructor de template tutzi



if(isset($_GET["page"])){//Si la variable page existe

include_once ($nivel_dir."tutzi/class/session.class.php");//Incluir Sessiones de Tutzi
include ($nivel_dir."view/inc/head.php");//template
include ($nivel_dir."view/inc/header.php");//template
include ($nivel_dir."view/inc/content.php");//template

//Incluir la pagina solicitada con get por ejemplo
//index.php?page=demo ... incluiria la pagina demo.view.php dentro
//del directorio view.
include ($nivel_dir."view/".$_GET["page"].".view.php");

//template
include ($nivel_dir."view/inc/foot.php");
//si no existe la variable page, mostrar la pagina para iniciar session
} else {
include($nivel_dir."view/login.view.php");
}

?>