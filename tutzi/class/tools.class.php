<?php
//tools.class.php

class Tools
{
function Tools(){
	
}
function safe_redirect($url){
// Solo usar header redirec si no ah sido usado, para envitar error
	//de headers ya redirecionadas.

if (!headers_sent()){
 
header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $url);
 
        // para IE
        header("Connection: close");
    }
 
    // Metodo HTML/JAVASCRIP:
    // Si no funciona en php intentar otros metodos.
 
    print '<html>';
    print '<head><title>Te estamos redirecionando...</title>';
    print '<meta http-equiv="Refresh" content="0;url='.$url.'" />';
    print '</head>';
    print '<body onload="location.replace(\''.$url.'\')">';
 
    // Si javascript no funciona  
    // el usuario podra darclick en un lunk
    print 'Debes de ser redirecionado a:<br />';
    print '<a href="'.$url.'">'.$url.'</a><br /><br />';
 
    print 'Si no funciona, porfavor dar click en link.<br />';    
 
    print '</body>';
    print '</html>';
 
    // salir
    exit;

} 



}

$tools= new Tools();
?>