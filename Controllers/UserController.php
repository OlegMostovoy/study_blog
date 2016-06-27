<?
 include "\Models\Profiles.php";
include "Controller.php";
class UserController extends Controller
{

	function __construct()
	{
		parent::__construct("Profiles");
	}
	
	public function Process(&$view ,&$data)
	{
		
		if($_POST['id'])
        {
        	
        	//$data=$this->UpdateUsersByID($_POST['id'],$_POST);
             $data=$this->PutProcess($_POST);
        }
        
        if($_GET['edit'])
        {
            //$data=$this->GetUsersByID($_GET['edit']);
            $data=$this->GetIndexProcess($_GET['edit']);
            $view="edit";
        
        }elseif ($_GET['delete']) 
        {
        	//echo('deleting');
            $data=$this->DeletetProcess($id);
            $data=$this->GetListProcess();
        	//$profile->DeleteUsersByID($_GET['delete']);
        	//$data=$profile->GetAllUsers();
        	$view="list";
        	unset($_GET['delete']);
        }else
        {
        	//$data=$this->GetAllUsers();
            $data=$this->GetListProcess();
        	$view="list";
        }
	}
}

?>