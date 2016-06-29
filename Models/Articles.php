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




    public function DeleteUsersByID($ID){
		$delete_query="DELETE FROM profiles_tab WHERE id=".$ID;
        $delete=mysql_query($delete_query);
	    return $delete;
    }

    public function save($id)
    {
    }

    public function update($data)
    {
        $update_query="UPDATE `profiles`.`articles_tab` SET title='".$data["title"]."',author='".$data["author"]."',article_text='".$data["article_text"]."' WHERE id=".(integer)$data["id"];

        $result=DataBaseConnection::query($update_query);
        if($result)
        {
            return $item=mysql_fetch_array($result);;
        }
        return false;  
    }
    
    public function delete($id)
    {
        $delete_query="DELETE FROM articles_tab WHERE id=".$id;
        $delete=DataBaseConnection::query($delete_query);
        return $delete;     
    }

    public function get($id)
    {
        echo "get";
        $query="SELECT * FROM ".$this->table." WHERE id=".$id;
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
          
            return $item;

        }
        return false;     
    }

    public function getlist()
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
            return $querydata;
           
        }
        return false;        
    }

    public function GetAllArticles()
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
        echo "ID: ".$ID;
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
          
            return $item;

        }
        return false;
    }

    public function GetByID($article_id){
        $ID=$article_id["id"];
        echo "ID: ".$ID;
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
          
            return $item;

        }
        return false;
    }

    public function GetArticleEditFormByID($ID){
        $query="SELECT * FROM ".$this->table." WHERE id=".$ID;
        $query_result=DataBaseConnection::query($query);
        if($query_result)
        {
              ?><pre><?print_r($item);?></pre><?
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

        $result=DataBaseConnection::query($update_query);
        if($result)
        {
            return $item=mysql_fetch_array($result);;
        }
        return false;
    }
}


?>