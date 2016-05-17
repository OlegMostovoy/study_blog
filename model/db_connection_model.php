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
		//echo("connection");
		$this->server="localhost";
        $this->database="profiles";
        $this->login ="root";
        $this->password="";
        $this->db_connection=mysql_connect($this->server, $this->login,$this->password="");
        $this->db_select=mysql_select_db( $this->database);
        //echo $this->db_select;
	}

	public function SendQuery($qery)
	{
		$this->result=mysql_query($query);
		return $this->result;
		
	}
	public function GetAllUsers()
	{
		$querydata=array();
		$query="SELECT * FROM profiles_tab";
        $query_result=mysql_query($query);
		while ($item=mysql_fetch_array( $query_result)) {
			 $querydata[$item['id']]=$item;
		}
		
		return $querydata;
		
	}
	
	public function GetUsersByID($ID){
		$query="SELECT * FROM profiles_tab WHERE id=".$ID;
        $query_result=mysql_query($query);
        if($query_result)
        {
        	return $item=mysql_fetch_array($query_result);;
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
        
         //$update_query="UPDATE `profiles_tab` SET `name`=".$_POST["name"].",`login`=".$_POST["login"].",`password`=".$_POST["password"].",`email`=".$_POST["email"].",`role`=".$_POST["role"]." WHERE id=".$_POST["id"];


        //echo  $update_query; 
        $result=mysql_query($update_query);
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



}


?>