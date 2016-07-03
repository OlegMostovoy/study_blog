<?
 //include "\Models\UserController.php";

class Controller 
{
	private  $ModejObject=null;

	function __construct($modelName)
	{
		if($modelName!=""){
			include_once "..\Models\\".$modelName.".php";

			$this->ModejObject=new $modelName;
		}else{
			echo "Controller: model name is empty";
		}
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

	public function PostProcess($data)
	{
		return $this->ModejObject->save($data);
	}
	
	public function PutProcess($data)
	{
		return $this->ModejObject->update($data);
	}
	public function GetIndexProcess($id)
	{
		return $this->ModejObject->get($id);
	}

	public function GetListProcess()
	{
		return $this->ModejObject->getlist();

	}
	public function DeletetProcess($id)
	{
		return $this->ModejObject->delete($id);
	}
	

}

?>