<?
include_once "/Profiles.php";
include_once "../Oauth/Oauth.php";
class Authorization 
{
    
    function __construct()
    {
        
    }

   // public function Login($username, $pass)
   //  {

   //      $UserData=false;
   //      $Profile= new Profiles;
   //      $UserData=$Profile->DataForLogin($username, $pass);
   //      if ($UserData)
   //      {
   //          session_start();
   //          $_SESSION['username'] = $UserData["name"];
   //          $_SESSION['userid'] = $UserData["id"];
   //          $_SESSION['authorized'] = "Y";
   //          setcookie('username' , $UserData["login"], time() + 3600 * 24 * 7) ;
   //          setcookie('password' , $UserData["password"], time() + 3600 * 24 * 7) ;
   //          echo"<pre>_COOKIE  "; print_r($_COOKIE['password']); echo "</pre>";
   //       return true;
   //      }
   //      return false;
   //  }

    public function Login($arrData)
    {

        $UserData=false;
        $Profile= new Profiles;
        $UserData=$Profile->DataForLogin($arrData['login'], $arrData['pass']);
        if ($UserData)
        {
            session_start();
            $_SESSION['username'] = $UserData["name"];
            $_SESSION['userid'] = $UserData["id"];
            $_SESSION['authorized'] = "Y";

            $oauth = new OAuth;
            $token_key=$oauth->generteTokenKey($UserData["id"],$_SERVER["HTTP_HOST"]);
            var_dump($UserData["id"]);
            var_dump($_SERVER["HOST"]);

            if($UserData["token"]!=$token_key)
            {
              var_dump($token_key);
              $oauth->updateToken($token_key,$UserData["id"]);
            }

            
            
            if($arrData['remember']=='on')
            {
                ?><pre>!<?print_r($UserData["login"]);?></pre><?
            setcookie('login' , $UserData["login"], time() + 3600 * 24 * 7, '/');    
            setcookie('pass' , $UserData["password"], time() + 3600 * 24 * 7, '/');     
            
            
            echo"<pre>_COOKIE login  "; print_r($_COOKIE['login']); echo "</pre>";
            }            
         return true;
        }
        return false;
    }

 // public function Remenber($data_array)
 //    {
 //    if($data_array["remember"]){
 //    setcookie('username' , $data_array["username"], time() + 3600 * 24 * 7) ;
 //    echo"<pre>_COOKIE  "; print_r($_COOKIE); echo "</pre>";
 //    }


    public function Logout()
        {
            setcookie('login' , '',time() - 42000, '/');
           
            setcookie('pass' ,'',time() - 42000, '/');
             //unset($_COOKIE['pass']);
             //unset($_COOKIE['login']);
            session_destroy();
            
             echo"<pre>_COOKIE_DESTROY login "; print_r($_COOKIE['login']); echo "</pre>";
              echo"<pre>_COOKIE_DESTROY pass "; print_r($_COOKIE['pass']); echo "</pre>";
            ?><pre><?print_r($_SESSION);?></pre><?
        }
}


?>