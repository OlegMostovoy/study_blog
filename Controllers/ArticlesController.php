<?php 
include "..\Models\Profiles.php";
include "Controller.php";
class ArticlesController extends Controller
{

	function __construct()
	{
		parent::__construct("Articles");
	}
	
	public function Process(&$view ,&$data)
	{
		if($_POST['id'])
        {
        	//echo"<pre>POST  ".print_r($_POST)."</pre>";
        	//$data=$this->UpdateArticleByID($_POST['id'],$_POST);
            $data=$this->PutProcess($_POST);
        }
        
        if($_GET['edit'])
        {
            $data=$this->GetIndexProcess($_GET['edit']);
            //$data["authors"]=$Users->getlist();
            $view="article_edit";
        
        }elseif ($_GET['delete']) 
        {
            $data=$this->DeletetProcess($id);
            $data=$this->GetListProcess();
        	$view="list";
        }else
        {
            $data=$this->GetListProcess();
        	$view="article";
        }
	}
    public function GetIndexProcess($id)
    {
        //$data=parent::GetIndexProcess($id);
        $data=$this->GetIndexProcess($id);
        $Users= new Profiles;
        $data["authors"]=$Users->GetAllUsers();
        return $data;
    }
}

 ?>