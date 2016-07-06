<?
include_once"OAuth.php";
if(count($_GET)==2)
{
	echo "string";
   $auth= new OAuth;
   $key=$auth->generteTokenKey($_GET["secret_key"],$_GET["url"]);
   var_dump($key);
   $auth->get($_GET);
   echo"<pre>";
   print_r($_SERVER);
   echo "</pre>";
}



?>