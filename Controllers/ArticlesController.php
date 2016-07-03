<?php 
include_once "..\Models\Profiles.php";
include_once"..\Models\Tags.php";
include_once "Controller.php";
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
        $data=parent::GetIndexProcess($id);
        $Users= new Profiles;
        $data["authors"]=$Users->getlist();
        $Tags = new Tags;
        $data["tags"]=$Tags->getlist($data["id"]);
        echo "<pre>tags "; print_r($data["tags"]); echo "</pre>";

        return $data;
    }

    public function GetListProcess()
    {
        $Tags = new Tags;
        $data=parent::GetListProcess();
       //echo "<pre>tags "; print_r($data); echo "</pre>";
        foreach ( $data as $value) {
            $value["tags"]=$Tags->getlist($value["id"]);
             echo "<pre>tags "; print_r($value["tags"]); echo "</pre>";
        }
        return $data;
    }
}

 ?>