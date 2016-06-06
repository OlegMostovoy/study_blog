<?
include "\header.php"; 
include "\\functions\auth_func.php";
if ( $_POST["username"] && $_POST["pass"] ){

include'\Models\DataBaseConnection.php';

DataBaseConnection::getInstance();

include "\Models\Profiles.php";





Logout();
///session_start();
if(Login($_POST["username"],$_POST["pass"])){

	header("Location: /article/index.php");
	exit();
}
echo "Auth error";
}else{
	Logout();
}
?>

<h1>Вход на сайт</h1>

	<form action="" method="post">
	
		<p>Name:</p>
		
		<input type="text" name="username" />
		<br/>
		<p>Password:</p>

		<input type="password" name="pass" />
		<br/>								
		<input type="checkbox" name="remember" /> Запоминть меня
		<br/>		
		<input type="submit" value="Войти" />
	
	</form>
