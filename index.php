
<? 
include "\header.php"; 
include'\model\db_connection_singletone.php';
DataBaseConnection::getInstance();
include "\controller\controller.php";
$view='';
$data=array();
$UserController = new UserController();
$UserController->Process($view, $data); 
include "\work_area.php";
?>