<?
include_once"..\Models\DataBaseConnection.php";


/**
* 
*/
class Tags  
{
	private $table_name="tags";
	function __construct()
	{
		DataBaseConnection::getInstance();

	}

	public function get($id)
	{
		$query="SELECT * FROM `profiles`.`".$this->table_name."` WHERE id=".$id;
		$result=DataBaseConnection::query($query);
		$item=array();
		if($result)
        {
            while ($item[]=mysql_fetch_array( $result ))
            {

            }
           
         }
         return $item;
	}

	public function getlist($article_id){
		$query="SELECT * FROM  `profiles`.`".$this->table_name."` WHERE article_id=".$article_id;
		$result=DataBaseConnection::query($query);
		$item=array();
		if($result)
        {
            while ($item[]=mysql_fetch_array( $result ))
            {

            }
           
         }
         return $item;
	}
	public function update($data){
		if(count($data)==2 && ($data["id"]!="" && $data["tag"]!=""))
		{
		 $query="UPDATE `profiles`.`".$this->table_name."` SET tag='".$data["tag"]."' WHERE id=".(integer)$data["id"];
		  $tresult=DataBaseConnection::query($query);
        }
	}

	public function save($data)
	{
		if(count($data)==2 && ($data["article_id"]!="" && $data["tag"]!=""))
		{
			$query="INSERT INTO `profiles`.`".$this->table_name."`(`article_id`,`tag`)VALUES ('".$data["article_id"]."','".$data["tag"]."');";
            $tresult=DataBaseConnection::query($query);
		}
		return false;
	}

	public function delete($id)
	{
		$query="DELETE FROM  `profiles`.`".$this->table_name."` WHERE id=".$id;
        return DataBaseConnection::query($query);
          

	}

	public function deleteall($article_id)
	{
	$query="DELETE FROM  `profiles`.`".$this->table_name."` WHERE article_id=".$article_id;
       return DataBaseConnection::query($query);
          
	}

	public function parceTags($tagsString,$article_id="")
	{
		$tags_array=explode(",", $tagsString);
		$result=array();

		foreach ($tags_array as $key => $value) 
		{
			if($value!="")
			{
				$arrTag["article_id"]=$article_id;
				$arrTag["tag"]=$value;
				$result[]=$arrTag;
			}	
		}
		return $result;
	}
	

}
?>