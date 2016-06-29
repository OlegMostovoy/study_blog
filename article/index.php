
<? 
include "..\header.php"; 
include'..\Models\DataBaseConnection.php';

DataBaseConnection::getInstance();
include "..\Models\Articles.php.";
include "..\Controllers\ArticlesController.php";
//session_start();
$view='';
$data=array();
$ArticleController = new ArticlesController();
$ArticleController->Process($view, $data); 
//include "\work_area.php";
?>

<?
if($view){
	//echo $view;
	//echo "<br/>..\\view\\".$view.".php<br/>";
	//print_r($data);
	//$view_path="view"."\\".$view.".php";
 include"..\\view\\".$view.".php";
 } ?>