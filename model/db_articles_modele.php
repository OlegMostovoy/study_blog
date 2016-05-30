<?

class Articles 
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
        $this->table ="articles_tab";
	}

	public function SendQuery($qery)
	{
		$this->result=mysql_query($query);
		return $this->result;
		
	}
	public function GetAllUsers()
	{
		$querydata=array();
		
        $query="SELECT * FROM ".$this->table;
        $query_result=DataBaseConnection::query($query);
        if($query_result)
        {
            while ($item=mysql_fetch_array( $query_result))
            {
                $query="SELECT name, id FROM profiles.profiles_tab WHERE id=".$item["author"];
                $author_query_result=DataBaseConnection::query($query);
                if($author_query_result)
                {
                    $author=mysql_fetch_array($author_query_result);
                    $item["author_name"]=$author;
                }
                $querydata[]=$item;
                
             }
                 ?><pre><?print_r($querydata);?></pre><? 
            return $querydata;
           
        }
        return false;

		
	}
	
	public function GetArticleByID($ID){
		$query="SELECT * FROM ".$this->table." WHERE id=".$ID;
        $query_result=DataBaseConnection::query($query);
        if($query_result)
        {
        	$item=mysql_fetch_array($query_result);
            $query="SELECT name, id FROM profiles.profiles_tab WHERE id=".$item["author"];
            $author_query_result=DataBaseConnection::query($query);
            if($author_query_result)
            {
                $author=mysql_fetch_array($author_query_result);
                $item["author_name"]=$author;
            }
            ?><pre><?print_r($item);?></pre><?
            return $item;

	    }
	    return false;
    }

    public function GetArticleEditFormByID($ID){
        $query="SELECT * FROM ".$this->table." WHERE id=".$ID;
        $query_result=DataBaseConnection::query($query);
        if($query_result)
        {
            $item=mysql_fetch_array($query_result);
            $query="SELECT name, id FROM profiles.profiles_tab";
            $author_query_result=DataBaseConnection::query($query);
            if($author_query_result)
            {
                while($author=mysql_fetch_array($author_query_result) ){;
                $item["authors"][]=$author;
            }
            }
            ?><pre><?print_r($item);?></pre><?
            return $item;

        }
        return false;
    }

    public function UpdateArticleByID($ID,$Data){
		$update_query="UPDATE `profiles`.`articles_tab` SET title='".$Data["title"]."',author='".$Data["author"]."',article_text='".$Data["article_text"]."' WHERE id=".(integer)$ID;
        
//          $update_query="UPDATE `profiles`.`articles_tab`
// SET `title` = '".$Data["title"]."', `article_text` = 'article_text'
  
 
// WHERE `id` = 1";


        //echo  $update_query; 
        $result=DataBaseConnection::query($update_query);
        if($result)
        {
        	return $item=mysql_fetch_array($result);;
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