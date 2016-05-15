<link rel='stylesheet' href='/css/bootstrap/css/bootstrap.min.css' type='text/css' media='all'>
<?php

$server="localhost";
$database="profiles";
$login ="root";
$password="";

$db_connection=mysql_connect($server,$login,$password);
$db_select=mysql_select_db($database);
echo" connection: ".$db_connection."<br/>";
$query="SELECT * FROM profiles_tab";

$result=mysql_query($query);
echo"<br/> query :".$query."<br/>";

?>
<?if($result){?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>id</th>
			<th>use name</th>
			<th>login</th>
			<th>e-mail</th>
			<th>password</th>
			<th>role</th>
			<th>edit</th>
			<th>remove</th>
		</tr>
	</thead>
	<tbody>
	 <?while ($item=mysql_fetch_array($result) ) {?>
	 <form action="delete.php" method="post">
	    <t>
	        <input type='hidden' name='id' value="<?=$item['id']?>">

			<td><? echo $item['id'];?></td>
			<td><? echo $item['name'];?></td>
			<td><? echo $item['login'];?></td>
			<td><? echo $item['password'];?></td>
			<td><? echo $item['email'];?></td>
			<td><? echo $item['role'];?></td>
			<td><a href="/edit.php?ID=<?=$item['id']?>"> edit</a></td>
			<td><input type="submit" value="Delete"></td>
		</tr>
	</form>
		<?}?>
	</tbody>
</table>
<?} ?>