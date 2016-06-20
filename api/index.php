
<?
header('Content-type: text/html; charset=UTF-8');
echo"test file: ";

//$_POST
if(count($_GET)>0){
	require_once "APIProcess.php";
	echo "<br/>is request<br/>";
	print_r($_GET);
?><ul><?
	foreach ($_REQUEST as $func => $params) {
		echo "<li> f= ".$func." p= ".$params."</li>";
	    $APIProcess= new APIProcess($func,$params);
		$APIProcess->CallFunction();
		break;
	}
	?></ul>><?
	//var_dump(json_decode($_REQUEST['apitest_helloAPIWithParams']));
}else{
	echo "</br>request is empty"; 
	$jsonError = new stdClass();
}

    // $jsonError->error = 'No function called';
    // echo json_encode($jsonError);
?>