<?
/**
* 
*/
class APIProcess 
{
	private $FunctionName;
	private $FunctionParams;
	function __construct($FuncName, $FuncParams)
	{
		echo "</br> func name: ".$FuncName;
		$this->FunctionParams=json_decode($FuncParams);
		$this->FunctionName=explode("_", strtolower($FuncName));
		echo "</br> ";
		//var_dump($this->FunctionName);
	}

	public function APICreateObject($APIName){
		require_once "APIBase.php";
		require_once $APIName.".php";
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
		echo "</br> file: ".$this->FunctionName[0].".php";
		if(file_exists($this->FunctionName[0].".php"))
		{
			echo "<br/> APICreateObject:".$this->FunctionName[1];
			$obj=$this->APICreateObject($this->FunctionName[0]);
			$func=$this->FunctionName[1];
			$params=json_decode($this->FunctionParams);
			$response=$this->EnptyJson();
			//$reflector = new ReflectionClass($this->FunctionName[0]);
			if(count($params>1))
			{

				return $obj->$func($params);
			}
			else
			{
				return $obj->$func($params);
			}
		}
	echo "APIProcess: error!";
	}
}
?>