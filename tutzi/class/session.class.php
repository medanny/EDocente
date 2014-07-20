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
        global $database;  
        session_start();   
        
        $this->logged_in = $this->checkLogin();
      }
      
      function checkLogin(){
        global $database,$user; 
        
        
        
        if(isset($_SESSION['username']) && isset($_SESSION['id'])){
          
           if($user->confirmUserID($_SESSION['username'], $_SESSION['id']) != 0){
           
              unset($_SESSION['username']);
              unset($_SESSION['userid']);
              return false;
           }
          
           $this->userinfo  = $user->getUserInfo($_SESSION['username']);
           $this->username  = $this->userinfo['idUsuario'];
           $this->userid    = $this->userinfo['idUsuario'];
           $this->userlevel = $this->userinfo['tipo'];
           return true;
        }
       
        else{
           return false;
        }
     }

      function logout(){  
     
     
      unset($_SESSION['username']);
      unset($_SESSION['id']);

     
      $this->logged_in = false;
   }
   
   

   function login($subuser, $subpass){
      global $database,$user;  

      ; 
      $result = $user->confirmUserPass($subuser, md5($subpass));

  
      if($result == 1){
         $field = "user";
         return "wronguser";
      }
      else if($result == 2){
         $field = "pass";
         return "wronguser";
      }
      

      if($result>=1){
         return false;
      }

      $this->userinfo  = $user->getUserInfo($subuser);
      $this->username  = $_SESSION['username'] = $this->userinfo['idUsuario'];
      $this->userid    = $_SESSION['id']   = $this->userinfo['idUsuario'];
      $this->userlevel = $this->userinfo['tipo'];
      
      
      return true;
   }

   

     
  



     
  };


  $session = new Session;

  ?>