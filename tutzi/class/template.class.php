<?php
class Template
//Inicio de clase
{
    var $siteName; //Nombre completo de la Persona
    var $title;
    var $HTML;
    function Template() {
        $this->HTML = " ";
    }
    function incHead() {
        $this->htmlAdd(file_get_contents('tutzi/inc/head.php'));
    }
    function incTail() {
        $this->htmlAdd(file_get_contents('tutzi/inc/tail.php'));
    }
    function cssrewrite($css) {
        $this->htmlAdd("<style>" . $css . " 
</style>");
    }
    function addFormbox($title, $header, $footer) {
        $this->htmlAdd('<div class="form-box"> 
            <div class="header">' . $title . '</div>' . $header . ' 
                <div class="footer">                                                                
                    ' . $footer . ' 
                     
                </div> 
            </form> 

            
            </div> 
        </div> 
');
    }
    function buildSite() {
        include ("tutzi/inc/head.php");
        //CONTENT HERE
        include ("tutzi/inc/tail.php");
    }
    function buildLogin() {
        include ("tutzi/inc/head.php");
        include ("tutzi/inc/login.php");
        include ("tutzi/inc/tail.php");
    }
    function strHeaderMsgs($number) {
        $this->htmlAdd('<li class="dropdown messages-menu"> 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                <i class="fa fa-envelope"></i> 
                                <span class="label label-success">4</span> 
                            </a> 
                            <ul class="dropdown-menu"> 
                                <li class="header">Tiene ');
        $this->htmlAdd($number . ' <li> 
                                    <ul class="menu">');
    }
    function HeaderMsgs_addMsg($img, $title, $msg, $mins) {
        $this->htmlAdd('<li> 
        <a href="#"> 
         <div class="pull-left"> 
          <img src="' . $img . ' " class="img-circle" alt="User Image"/> 
                                                </div> 
                                                <h4>' . $title . ' <small><i class="fa fa-clock-o"></i>' . $mins . ' mins</small> 
                                                </h4> 
                                                <p>' . $msg . '</p> 
                                            </a> 
                                        </li>');
    }
    function HeaderMsgs_reder() {
        $this->htmlAdd('</ul> 
                                </li> 
                                <li class="footer"><a href="#">Mirar todos los mensajes</a></li> 
                            </ul> 
                        </li>');
        // return this->$HTML;
        echo $this->HTML;
    }
    function render() {
        return $this->HTML;
        $this->HTML = " ";
    }
    function mostrarAdvertencia($tipo, $texto) {
        switch ($tipo) {
            case "peligro":
                return '<div class="alert alert-danger alert-dismissable"> 
<i class="fa fa-ban"></i> 
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>' . $texto . '</div>';
                # code...
                
            break;
            case "info":
                return '<div class="alert alert-info alert-dismissable"> 
                                        <i class="fa fa-info"></i> 
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>' . $texto . '</div>';
            break;
            case "advertencia":
                return '<div class="alert alert-warning alert-dismissable"> 
                                        <i class="fa fa-warning"></i> 
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button> 
                                        ' . $texto . '</div>';
            break;
            case "exito":
                return '<div class="alert alert-success alert-dismissable"> 
                                        <i class="fa fa-check"></i> 
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>' . $texto . '</div>';
            break;
            default:
                # code...
                
            break;
        }
    }
    function htmlAdd($text) {
        $this->HTML = $this->HTML . $text;
    }
}
$template = new Template();
?>