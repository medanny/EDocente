  <?php
  /**
   * session.php
   * 
   * Esta clase se encarga de administrar todas las funciones de usuarios.
   */

  include("user.class.php");
        
        
  class Session//Inicio de clase
  {
      var $username;     //Usuario
      var $password;       //Contrasena
      var $name;    //nombre
      var $userid;         //id
      var $userlevel;          //nivel
      var $logged_in;    //Verdadero o Falso
      var $id_ejercisio; // La id del ejercisio selecionado
      var $userinfo = array();  //Array con toda la informacion del usuario
      
      function Session(){
        $this->startSession();
            }

     function startSession(){
        global $database;  //The database connection
        session_start();   //Tell PHP to start the session
        
        $this->logged_in = $this->checkLogin();
      }
      
      function checkLogin(){
        global $database,$user;  //The database connection
        
        /* Username and userid have been set and not guest */
        
        
        if(isset($_SESSION['username']) && isset($_SESSION['id'])){
           /* Confirm that username and userid are valid */

           if($user->confirmUserID($_SESSION['username'], $_SESSION['id']) != 0){
              /* Variables are incorrect, user not logged in */
              unset($_SESSION['username']);
              unset($_SESSION['userid']);
              return false;
           }
           /* User is logged in, set class variables */
           $this->userinfo  = $user->getUserInfo($_SESSION['username']);
           $this->username  = $this->userinfo['idUsuario'];
           $this->userid    = $this->userinfo['idUsuario'];
           $this->userlevel = $this->userinfo['tipo'];
           return true;
        }
        /* User not logged in */
        else{
           return false;
        }
     }

      function logout(){  //The database connection
     
      /* Unset PHP session variables */
      unset($_SESSION['username']);
      unset($_SESSION['id']);

      /* Reflect fact that user has logged out */
      $this->logged_in = false;
   }
   
   

   function login($subuser, $subpass){
      global $database,$user;  

      ;  //The database and form object
      $result = $user->confirmUserPass($subuser, md5($subpass));

      /* Check error codes */
      if($result == 1){
         $field = "user";
         return "wronguser";
      }
      else if($result == 2){
         $field = "pass";
         return "wronguser";
      }
      
      /* Return if form errors exist */
      if($result>=1){
         return false;
      }

      /* Username and password correct, register session variables */
      $this->userinfo  = $user->getUserInfo($subuser);
      $this->username  = $_SESSION['username'] = $this->userinfo['idUsuario'];
      $this->userid    = $_SESSION['id']   = $this->userinfo['idUsuario'];
      $this->userlevel = $this->userinfo['tipo'];
      
      
         /* Login completed successfully */
      return true;
   }

   

     
  



     
  };


  $session = new Session;

  ?>