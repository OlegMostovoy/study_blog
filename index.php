
<? 
include "\header.php"; 
include'\Models\DataBaseConnection.php';
DataBaseConnection::getInstance();
include "\Controllers\UserController.php";

$view='';
$data=array();
$UserController = new UserController();
$UserController->Process($view, $data); 
include "\work_area.php";
?>