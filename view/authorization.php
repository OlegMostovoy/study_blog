
<?
echo"<pre>_COOKIE_DESTROY login1 "; print_r($_COOKIE['login']); echo "</pre>";
              echo"<pre>_COOKIE_DESTROY pass1 "; print_r($_COOKIE['pass']); echo "</pre>";
?>
<h1>Вход на сайт</h1>

	<form action="../authorization/index.php" method="post">
	
		<p>Login:</p>
		
		<input type="text" name="login" value="<?=$_COOKIE['login']?>" />
		<br/>
		<p>Password:</p>

		<input type="password" name="pass" value="<?=$_COOKIE['pass']?>" />
		<br/>								
		<input type="checkbox" name="remember" />Remember me
		<br/>		
		<input type="submit" value="Enter" />
	
	</form>
