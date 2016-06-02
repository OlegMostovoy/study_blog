
<? 
include "..\header.php"; 
include'..\model\db_connection_singletone.php';
 include "..\model\db_connection_model.php";
DataBaseConnection::getInstance();
include "..\model\db_articles_modele.php.";
include "..\controller\ArticlesController.php";
session_start();
$view='';
$data=array();
$ArticleController = new ArticlesController();
$ArticleController->Process($view, $data); 
//include "\work_area.php";
?>

<?
if($view){
	//$view_path="view"."\\".$view.".php";
 include"..\\view\\".$view.".php";
 } ?>