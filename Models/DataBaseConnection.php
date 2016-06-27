<?php 
class DataBaseConnection 
{
	static private $instance;
	protected $dbselect;
	protected $db_connection;
	
	private function __construct()
	{
		//echo("db_connection CREATED!");
		$this->db_connection=mysql_connect("localhost", "root" ,"");
        $this->dbselect=mysql_select_db("profiles");
		
	}

	protected function __clone()
	{
		
	}

	 public static function getInstance(){

		if( is_null(self::$instance) )
		{

        self::$instance=new self;

		}
		return self::$instance;
	}

	public static function query($query){
		//echo("QUERY: ");
		$obj=self::$instance;
		if (isset($obj->dbselect)){
			//  echo $query."</br>";
			 $result=mysql_query($query);
			 return $result;
		}
		else{
			echo("db_connection ERROR!");
		}

	}
} ?>