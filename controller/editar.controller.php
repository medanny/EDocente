<?php 
//Models go here
if(!isset($nivel_dir)){
$nivel_dir="../";  
}
include ($nivel_dir."models/editar.model.php");

class Editar_Controller{//Clase



	function Editar_Controller(){//Constructor
if(isset($_POST['tipo'])){
      switch ($_POST['tipo']) {
        case "maestro":
          # code...
        $this->updatemaestro();
          break;
        
        default:
          # code...
          break;
      }
    }

	}


function updatemaestro(){
global $editar;
$editar->updatemaestro($_POST['campo'],$_POST['value'],$_POST['id']);

}
function cargarPagina($pagina){
global $editar;

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
        //echo "TIMEOUT!";
      }



  function cargarAccion($accion,$id){
    global $editar;
  if($accion=="MaestroEscuela"){
    return $editar->maestroEscuela($id);
  }else if($accion=="MaestroEstatus"){
    return $editar->maestroEstatus($id);
  }else if($accion=="MaestroGrupo"){
    return $editar->maestroGrupo($id);
  }else if($accion=="escuelaFacultad"){
    return $editar->escuelaFacultad($id);
  }else if($accion=="escuelaDirector"){
    return $editar->escuelaDirector($id);
  }else if($accion=="facultadDirector"){
    return $editar->facultadDirector($id);
  }


  }

}

$editar_controller = new Editar_Controller();
?>