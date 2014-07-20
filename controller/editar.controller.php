<?php 
//Models go here
include ("models/editar.model.php");
global $editar;

class Editar_Controller{//Clase

	function Model(){//Constructor


	}
	function cargarPagina($name){

        switch ($pagina) {
            case "maestro":
                # code...
           return $editar->maestro();
                break;
            case "escuela":
                # code...
           return $editar->escuela();
                break;
            case "facultad":
                # code...
           return $editar->facultad();
                break;
            default:
                return "NOT FOUND";
                break;
        }
        $editar->maestro();
        //echo "TIMEOUT!";
      }


	}

}

$editar_controller = new Editar_Controller();
?>