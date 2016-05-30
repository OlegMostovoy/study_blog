<?if($data){
	?>
	
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
	 <?foreach ($data as $key => $value)
	 {?>
	    <tr>
	        <input type='hidden' name='id' value="<?=$item['id']?>">
			<td><? echo $value['id'];?></td>
			<td><? echo $value['name'];?></td>
			<td><? echo $value['login'];?></td>
			<td><? echo $value['password'];?></td>
			<td><? echo $value['email'];?></td>
			<td><? echo $value['role'];?></td>
			<td><a href="/index.php?edit=<?=$value['id']?>"> edit</a></td>
			<td><a href="/index.php?delete=<?=$value['id']?>"> delete</a></td>	
		</tr>
	
		<?}?>
	</tbody>
</table>
<?} ?>