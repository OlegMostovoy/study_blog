<?
include'..\Models\DataBaseConnection.php';
/**
* 
*/
class APIProcess 
{
	private $FunctionName;
	private $FunctionParams;
	function __construct($FuncName, $FuncParams="")
	{   DataBaseConnection::getInstance();
		echo "</br> func name: ".$FuncName;
		echo "</br> func params: ".$FuncParams;
		$this->FunctionParams=json_decode($FuncParams,true);
		echo "</br> func decode params: ".$FuncParams;
		echo "<br/>PARAMS: ";  print_r($this->FunctionParams); echo "<br/>";
		$this->FunctionName=explode("_", strtolower($FuncName));
		echo "</br> ";
	}

	// public function APICreateObject($APIName){
	// 	require_once "APIBase.php";
	// 	require_once $APIName.".php";
	// 	echo "<br/> class:".$APIName;
	// 	$APIObject= new $APIName;

	// 	return $APIObject;

	// }

	public function APICreateObject($APIName){
		require_once "..\Models\\".$APIName.".php";
		echo "<br/> class:".$APIName;
		$APIObject= new $APIName;

		return $APIObject;

	}

	function EnptyJson() {
		$retObject = new stdClass();
        $retObject = json_decode('{}');
        //$response = APIConstants::$RESPONSE;
        $retObject->response = json_decode('{}');
        return $retObject;
    }

	public function CallFunction()
	{
		//echo "</br> file: ".$this->FunctionName[0].".php";

		if(file_exists( "..\Models\\".$this->FunctionName[0].".php"))
		{
			echo "<br/> APICreateObject:".$this->FunctionName[1];
			$obj=$this->APICreateObject($this->FunctionName[0]);
			$func=$this->FunctionName[1];
			$params=$this->FunctionParams;
			
			$response=$this->EnptyJson();
			//$reflector = new ReflectionClass($this->FunctionName[0]);
			if(count($params>1))
			{
echo json_encode($obj->$func($params));
				//return $obj->$func($params);
			}
			else
			{
				echo json_encode($obj->$func($params));
				return $obj->$func($params);
			}
		}else
		{
	      echo "APIProcess: error!";
	    }
	}
}
?>