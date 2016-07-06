<?
include_once'..\Models\DataBaseConnection.php';
include_once'..\Models\Profiles.php';
/**
* 
*/
class OAuth  
{
	
	function __construct()
	{
		DataBaseConnection::getInstance();
	}

	public function isToken(){
		if($_REQUEST["token"]!=""){
			return true;
		}
		return false;
	}

	public function checkTokenKey($key)
	{
		$profile=new Profiles;
		

		$result=$profile->getByToken($key);
        if($result ||$_SERVER['REQUEST_METHOD']="GET")
        {
        	return true;
        }
        return false;
	}
	public function validateTokenKey($key)
	{
		$profile=new Profiles;
		

		$result=$profile->getByToken($key);
		echo "resulr".$key;
		var_dump($result);
        if($result)
        {
        	return true;
        }
        return false;
	}

	public function generteTokenKey($SecretKey, $url)
	{
		return md5($SecretKey.$url);
	}

	public function updateToken($tokenKey, $id)
	{
		DataBaseConnection::getInstance();

        $update_query="UPDATE profiles_tab SET 
        token='".$tokenKey."' WHERE id=".(integer)$id;
        $result=DataBaseConnection::query($update_query);
        if($query_result)
        {
            return $item=mysql_fetch_array($query_result);;
        }
        return false;
	}
	public function get($data)
	{
		$host=str_replace("http:", "", $data["url"]);
		$host=str_replace("/", "",$host);

		$input_token=$this->generteTokenKey($data["secret_key"],$host);
		print_r( count($this->validateTokenKey($input_token)));
		if(count($this->validateTokenKey($input_token))>1)
		{
			echo "  SUCCESS!!!!   ";
			//unset($_GET);
			//$result_string="http://my.blog/Oauth/?secret_key=".$data["secret_key"]."&url=".$data["url"]."token=".$input_token;
			header("Location: http://my.blog/Oauth/?secret_key=".$data["secret_key"]."&url=".$data["url"]."&token=".$input_token);
		}

		return false; 
	}
}
?>