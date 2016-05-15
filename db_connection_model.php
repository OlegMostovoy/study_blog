<?

class Profiles 
{
    var $db_connection;
    var $db_select;
    var $result;

	function __construct(argument)
	{
		$this->server="localhost";
        $this->database="profiles";
        $this->login ="root";
        $this->password="";
        $this->db_connection=mysql_connect($server,$login,$password);
        $this->db_select=mysql_select_db($database);
	}

	public function SendQuery($qery)
	{
		$this->result=mysql_query($query);
		return $this->result;
		
	}
	



}





while ($res=mysql_fetch_array($result)) {
     $item[$res[' ']]
      }
?>