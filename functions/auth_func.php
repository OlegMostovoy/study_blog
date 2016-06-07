<?
function Login($username, $pass)
{
	$UserData=false;
	$UserData=Profiles::AuthorizeUser($username, $pass);
	if ($UserData)
	{
		$_SESSION['username'] = $UserData["name"];
		$_SESSION['userid'] = $UserData["id"];
		$_SESSION['authorized'] = "Y";
     return true;
	}
	return false;
}


function Logout()
{
	
	//setcookie('username', '', time() - 1);	
	
	
	    unset($_SESSION['username']); 
		unset($_SESSION['userid']);
		unset($_SESSION['authorized']);
	//unset($_SESSION);
        session_destroy();
	?><pre><?print_r($_SESSION);?></pre><?
}



?>