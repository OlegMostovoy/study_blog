<? 
include "..\header.php"; 
include'..\Models\DataBaseConnection.php';

DataBaseConnection::getInstance();
//include "..\Models\Authorization.php.";
include "..\Controllers\AuthController.php";
//session_start();
$view='';
$data=array();
$AuthController = new AuthController();
$AuthController->Process($view, $data); 
//include "\work_area.php";
?>

<?
if($view){
	//$view_path="view"."\\".$view.".php";
 include"..\\view\\".$view.".php";
 } ?>