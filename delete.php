<?php 
$server="localhost";
$database="profiles";
$login ="root";
$password="";

$db_connection=mysql_connect($server,$login,$password);
$db_select=mysql_select_db($database);

if($_POST["id"]!='')
{
	echo $_POST["id"];
   $id=(integer)$_POST['id'];

   $delete_query="DELETE FROM profiles_tab WHERE id=".$id;
   $delete=mysql_query($delete_query);

   if($delete)
        {
        echo "данные отправлены ".$delete_query;
        }
    else
        {
        echo "данные не отправлены";
        }
         ?>

   <?

}header( 'Location: http://mysite.site/index.php');