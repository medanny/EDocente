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
      /* Error occurred, return given name by default */
      if(!$result || $nrows< 1){
         return NULL;
      }
      /* Return result array */

        $dbarray = $result->fetch_assoc();
      return $dbarray;


   }

   function confirmUserPass($username, $password){
      global $database;
      /* Verify that user is in database */
      $result=$database->selectField("Usuario","idUsuario",$username);
       $nrows=$result->num_rows;
      if(!$result || $nrows < 1){
         return 1; //Indicates username failure
         echo "No existe el usuario";

      }

      /* Retrieve password from result, strip slashes */
      $dbarray = $result->fetch_assoc();
      /* Validate that password is correct */
      if($password == $dbarray['clave']){
         return 0; //Success! Username and password confirmed
         echo "Clave Correcta!";
      }
      else{
         return 2; //Indicates password failure
         echo "Clave Invorrecta";
      }
   }

     
  };

  $user = new User;

  ?>
