  <?php
  /**
   * User.php
   * 
   * Esta clase se encarga de administrar todas las funciones de usuarios.
   */

  // incluir archivo con todas las variables necesarias

  include("database.class.php");
        
  class User//Inicio de clase
  {
     
     function addUser($user,$password,$deparment){
      global $database; 
      $password=md5($password);
      $database->insertValues("users","(NULL,'$user','$password','$deparment')");
      return "El usuario a $user a sido agregado.";

     }  
     
     function confirmUserID($user,$id){
      global $database;
      $result=$database->selectField("Usuario", "idUsuario", $user);
      $nrows=$result->num_rows;

       if(!$result || $nrows < 1){
           
           return 1; //No se encontro el usuario en la base de datos.
           echo "NO SE ENCONTRO AL USUARIO";
        }
        
        $dbarray = $result->fetch_assoc();
        /* Validar que el usuario y id sean validas */
        if($id == $dbarray['idUsuario']){
           return 0; //son correctos
        }
        else{
           return 2; //ID invalida
           echo "CONTRASENA INVALIDA!";
        }
     }


     function getUserInfo($username){
      global $database;

      $q = "SELECT * FROM Usuario WHERE idUsuario = '$username'";
      $result = $database->query($q);
       $nrows=$result->num_rows;
      /* Ocurrio un error */
      if(!$result || $nrows< 1){
         return NULL;
      }
      /* Regresar todo el array con la informacion. */

        $dbarray = $result->fetch_assoc();
      return $dbarray;


   }

   function confirmUserPass($username, $password){
      global $database;
      $result=$database->selectField("Usuario","idUsuario",$username);
       $nrows=$result->num_rows;
      if(!$result || $nrows < 1){
         return 1;
         echo "No existe el usuario";

      }

      $dbarray = $result->fetch_assoc();
      if($password == $dbarray['clave']){
         return 0; 
         echo "Clave Correcta!";
      }
      else{
         return 2; 
         echo "Clave Invorrecta";
      }
   }

     
  };

  $user = new User;

  ?>
