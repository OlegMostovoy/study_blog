
<?
header('Content-type: text/html; charset=UTF-8');


if(count($_REQUEST)>0)
{
	include_once "../OAuth/OAuth.php";
	$TokenAccess=false;
	$oauth= new OAuth;
	if($oauth->isToken()){
		$TokenAccess=$oauth->checkTokenKey($_REQUEST["token"]);
	}
	if($TokenAccess)
	{
	    include_once "APIProcess.php";
    
	    foreach ($_REQUEST as $func => $params) {
	        $APIProcess= new APIProcess($func,$params);
	    	$APIProcess->CallFunction();
	    	break;
	    }
	}
	else
	{
     echo "error: token auth FALSE";
	}
}else{
	echo "</br>request is empty"; 
	$jsonError = new stdClass();
}

?>