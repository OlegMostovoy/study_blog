
<? 
include "\header.php"; 
include "\controller\controller.php";
$view='';
$data=array();
$UserController = new UserController();
$UserController->Process($view, $data); 
include "\work_area.php";
?>