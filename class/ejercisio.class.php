  <?php
  /**
   * User.php
   * 
   * Esta clase se encarga de administrar todas las funciones de usuarios.
   */

  // incluir archivo con todas las variables necesarias

        
  class Ejercisio//Inicio de clase
  {
     
     function insEjercisio($nombre_empresa,$descripcion,$rfc,$direccion,$telefono){
      global $database;
      $database->insertValues("ejercisio","(NULL,'$nombre_empresa','$descripcion','$rfc','$direccion','$telefono')");
     }
     function getEjercisios(){
      global $database;
      $content=$database->selectAll("ejercisio");
      return $content;
     } 
     function getEjercisio($id){
      global $database;
      $content=$database->query("SELECT * FROM `ejercisio` WHERE `id` = $id");
      return $content;
     } 
    
     
  };

  $ejercisio = new Ejercisio;

  ?>
