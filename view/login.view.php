<?php
if(!isset($nivel_dir)){
$nivel_dir="../";	
}
$isindex=1;
include_once ($nivel_dir."tutzi/class/template.class.php");
include_once ($nivel_dir."tutzi/template/builder/form.template.php");

global $template;
global $form;


$template->incHead();
$template->cssrewrite("
	body {
    background-color: #222222;
	}
    html {
    background-color: #222222;
    }
     ");


$form->inicForm("controller/process.controller.php","post");
$form->addhtml('<div class="body bg-gray">');
$form->addinput("text","user","form-control", "Usuario");
$form->addinput("password","pass","form-control", "Contrasena");
$form->addinput("hidden","login","form-control", "login");

$form->addhtml('</div>');
$form->addbutton("submit","btn bg-olive btn-block","Iniciar Session");
$content=$form->render();
$footer=' <p><a href="#">Olvide mi contrasena</a></p>';
$template->addFormbox("Inciar Session",$content,$footer);

$template->incTail();

echo $template->render();



               


?>