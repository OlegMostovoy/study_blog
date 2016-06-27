<?

class Profiles 
{
    protected $db_connection;
    protected $db_select;
    protected $result;
    protected $server;
    protected $login;
    protected $database;
    protected $password;

	function __construct()
	{
		// echo("connection");
		// $this->server="localhost";
        // $this->database="profiles";
        // $this->login ="root";
        // $this->password="";
        // $this->db_connection=mysql_connect($this->server, $this->login,$this->password="");
        // $this->db_select=mysql_select_db( $this->database);
        // echo $this->db_select;
	}

    public function save($id)
    {

    }

    public function update($data)
    {
        $update_query="UPDATE profiles_tab SET 
        name='".$data["name"]."', 
        login='".$data["login"]."', 
        password='".$data["password"]."', 
        email='".$data["email"]."',
        role='".$data["role"]."' WHERE id=".(integer)$data["id"];
        $result=DataBaseConnection::query($update_query);
        if($query_result)
        {
            return $item=mysql_fetch_array($query_result);;
        }
        return false;
    }

    public function delete($id)
    {
        $delete_query="DELETE FROM profiles_tab WHERE id=".$ID;
        $delete=mysql_query($delete_query);
        return $delete;
    }

    public function get($id)
    {
        $query="SELECT * FROM profiles_tab WHERE id=".$id;
        $query_result=DataBaseConnection::query($query);
        if($query_result)
        {
            //return $item=mysql_fetch_array($query_result);;
            return mysql_fetch_array($query_result);
        }
        return false;

    }

    public function getlist()
    {
        $querydata=array();
        $query="SELECT * FROM profiles_tab";
        //echo $query."!</br>";
        $query_result=DataBaseConnection::query($query);
        while ($item=mysql_fetch_array( $query_result)) {
            $querydata[$item['id']]=$item;
        }
        if(count($querydata))
        {
            return $querydata;
        }
        return false;

    }
 





	
	public function GetAllUsers()
	{
		$querydata=array();
		$query="SELECT * FROM profiles_tab";
        echo $query."!</br>";
        $query_result=DataBaseConnection::query($query);
		while ($item=mysql_fetch_array( $query_result)) {
			 $querydata[$item['id']]=$item;
		}
		
		return $querydata;
		
	}
	
	public function GetUsersByID($ID){
		$query="SELECT * FROM profiles_tab WHERE id=".$ID;
        $query_result=DataBaseConnection::query($query);
        if($query_result)
        {
        	//return $item=mysql_fetch_array($query_result);;
            return mysql_fetch_array($query_result);
	    }
	    return false;
    }

    public function UpdateUsersByID($ID,$UserData){
		$update_query="UPDATE profiles_tab SET 
        name='".$UserData["name"]."', 
        login='".$UserData["login"]."', 
        password='".$UserData["password"]."', 
        email='".$UserData["email"]."',
        role='".$UserData["role"]."' WHERE id=".(integer)$ID;
        $result=DataBaseConnection::query($update_query);
        if($query_result)
        {
        	return $item=mysql_fetch_array($query_result);;
	    }
	    return false;
    }

    public function DeleteUsersByID($ID){
		$delete_query="DELETE FROM profiles_tab WHERE id=".$ID;
        $delete=mysql_query($delete_query);
	    return $delete;
    }



    public function DataForLogin($User, $Pass){
        $query="SELECT * FROM `profiles`.`profiles_tab` WHERE 
        login ='".$User."' AND
        password='".$Pass."'";
        $query_result=DataBaseConnection::query($query);
        if($query_result)
        {
            return $item=mysql_fetch_array($query_result);;
        }
        return false;
    }



}


?>