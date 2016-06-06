<?php 
include "..\Models\Profiles.php";
class ArticlesController extends Articles
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function Process(&$view ,&$data)
	{
		
		if($_POST['id'])
        {
        	echo"<pre>POST  ".print_r($_POST)."</pre>";
        	$data=$this->UpdateArticleByID($_POST['id'],$_POST);
        }
        
        if($_GET['edit'])
        {
            $data=$this->GetArticleByID($_GET['edit']);
            $Users= new Profiles;

            $data["authors"]=$Users->GetAllUsers();
            echo"<pre>  ";print_r($data);echo"</pre>";
            $view="article_edit";
        
        }elseif ($_GET['delete']) 
        {
        	//echo('deleting');
        	$profile->DeleteUsersByID($_GET['delete']);
        	$data=$profile->GetAllUsers();
        	$view="list";
        	unset($_GET['delete']);
        }else
        {
        	//$data=$this->GetAllUsers();
            //$data=$this->GetArticleEditFormByID(1);
$data=$this->GetAllUsers();
        	$view="article";
        }
	}
}

 ?>