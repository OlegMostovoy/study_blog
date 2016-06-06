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
		
		if($_POST['username'] && $_POST['pass'] )
        {
        	
            $this->Logout();
           
        	if($this->Login($_POST['username'], $_POST['pass']) )
            {
              header("Location: /article/index.php");
              exit();
            }
        }
        
        if($_GET['auth'])
        {
            
            $view="authorization";
        
        }elseif ($_GET['logout']) 
        {
        	 $this->Logout();
        	$view="authorization";
        	
        }else
        {

        	$view="authorization";
        }
	}
}

 ?>