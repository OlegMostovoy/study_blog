<?
include "/Profiles.php";
class Authorization 
{
    
    function __construct()
    {
        
    }

   public function Login($username, $pass)
    {

        $UserData=false;
        $Profile= new Profiles;
        $UserData=$Profile->DataForLogin($username, $pass);
echo"<pre>UserData  "; print_r($username); echo "</pre>";
        if ($UserData)
        {
            session_start();
            $_SESSION['username'] = $UserData["name"];
            $_SESSION['userid'] = $UserData["id"];
            $_SESSION['authorized'] = "Y";
         return true;
        }
        return false;
    }
 public function Remenber($data_array)
    {
    if($data_array["remember"]){}
    setcookie('username' , $data_array["username"], time() + 3600 * 24 * 7) ;

    }


    public function Logout()
        {
            setcookie('username' , '' , time() - 1) ;
            session_destroy();
            ?><pre><?print_r($_SESSION);?></pre><?
        }
}


?>