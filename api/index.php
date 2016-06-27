
<?
header('Content-type: text/html; charset=UTF-8');

//$_POST
if(count($_REQUEST)>0){
	require_once "APIProcess.php";
	//echo "<br/>is request<br/>";
	//print_r($_REQUEST);
	foreach ($_REQUEST as $func => $params) {
	    $APIProcess= new APIProcess($func,$params);
		$APIProcess->CallFunction();
		break;
	}
}else{
	echo "</br>request is empty"; 
	$jsonError = new stdClass();
}

?>