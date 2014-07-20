<?php 
include ("models/editar.model.php");
global $editar;
//Content goes here....

if(isset($_GET['tipo'])){

        switch ($_GET['tipo']) {
            case "maestro":
                # code...
           echo $editar->maestro();
                break;
            case "escuela":
                # code...
           echo $editar->escuela();
                break;
            case "facultad":
                # code...
           echo $editar->facultad();
                break;
            default:
                echo "NOT FOUND";
                break;
        }
        $editar->maestro();
        //echo "TIMEOUT!";
      }


?>