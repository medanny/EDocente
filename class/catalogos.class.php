  <?php
  /**
   * User.php
   * 
   * Esta clase se encarga de administrar todas las funciones de usuarios.
   */

  // incluir archivo con todas las variables necesarias

        
  class catalogos//Inicio de clase
  {
     
     function insCuenta($nombre,$descripcion,$tipo,$ejercisio){
      global $database;
      $database->insertValues("cuenta","(NULL,'$nombre','$descripcion','$tipo','$ejercisio')");
     }
     
     function getClases($id){
      global $database;
      $q ="SELECT * FROM `cuenta` WHERE `id_ejercisio` = $id";
      //echo $q;
      $content=$database->query($q);
      return $content;
     }
     function getTipo(){
      global $database;
      $content=$database->query("SELECT * FROM `tipo`");
      return $content;

     } 
     
    
     
  };

  $catalogo = new catalogos();

  ?>
