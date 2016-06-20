<?
 include "\Models\UserController.php";

class Controller 
{

	function __construct()
	{
		//parent::__construct();
	}
	
	public function Process(&$view ,&$data)
	{
		
		if($_POST['id'])
        {
        	//echo"<pre>".print_r($_POST)."</pre>";
        	$data=$this->UpdateUsersByID($_POST['id'],$_POST);
        }
        
        if($_GET['edit'])
        {
            $data=$this->GetUsersByID($_GET['edit']);
            $view="edit";
        
        }elseif ($_GET['delete']) 
        {
        	//echo('deleting');
        	$profile->DeleteUsersByID($_GET['delete']);
        	$data=$profile->GetAllUsers();
        	$view="list";
        	unset($_GET['delete']);
        }else
        {
        	$data=$this->GetAllUsers();
        
        	$view="list";
        }
	}
}

?>