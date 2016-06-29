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
		$this->FunctionParams=json_decode($FuncParams,true);
		$this->FunctionName=explode("_", strtolower($FuncName));
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
		if(file_exists( "..\Models\\".$this->FunctionName[0].".php"))
		{
			$obj=$this->APICreateObject($this->FunctionName[0]);
			$func=$this->FunctionName[1];
			$params=$this->FunctionParams;
			$response=$this->EnptyJson();
			//$reflector = new ReflectionClass($this->FunctionName[0]);

			if(count($params)>1)
			{
                echo json_encode($obj->$func($params));
				//return $obj->$func($params);
			}
			else
			{
				//print_r($params["id"]);
				echo json_encode($obj->$func($params["id"]));

				return $obj->$func($params["id"]);
			}
		}else
		{
	      echo "APIProcess: error!";
	    }
	}
}
?>