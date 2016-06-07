<?php 
include "..\Models\Authorization.php";
class AuthController extends Authorization
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function Process(&$view ,&$data)
	{
		
		if($_POST['login'] && $_POST['pass'] )
        {
        	
            $this->Logout();
           
        	if($this->Login($_POST) )
            {
              //header("Location: /article/index.php");
              //exit();
            }
        }
        
        if($_GET['auth'])
        {
            
            $view="authorization";
        
        }elseif ($_GET['logout']) 
        {
        	 $this->Logout();
             //header("Refresh:3");
        	$view="authorization";
        	
        }else
        {

        	$view="authorization";
        }
	}
}

 ?>