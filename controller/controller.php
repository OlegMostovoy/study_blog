<?
 include "\model\db_connection_model.php";
//$profile=new Profiles;


// $view='';
// $data=array();

// if($_POST['id'])
// {
// 	echo"<pre>".print_r($_POST)."</pre>";
// 	$data=$profile->UpdateUsersByID($_POST['id'],$_POST);
// }

// if($_GET['edit'])
// {
//     $data=$profile->GetUsersByID($_GET['edit']);
//     $view="edit";

// }elseif ($_GET['delete']) 
// {
// 	echo('deleting');
// 	$profile->DeleteUsersByID($_GET['delete']);
// 	$data=$profile->GetAllUsers();
// 	$view="list";
// 	unset($_GET['delete']);
// }else
// {
// 	$data=$profile->GetAllUsers();

// 	$view="list";
// }

/**
* 
*/
class UserController extends Profiles
{

	function __construct()
	{
		parent::__construct();
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