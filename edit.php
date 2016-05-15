<link rel='stylesheet' href='/css/bootstrap/css/bootstrap.min.css' type='text/css' media='all'>
<link rel='stylesheet' href='/css/custom.css' type='text/css'>

<?php 
if($_GET["ID"])
    {
       
        $server="localhost";
        $database="profiles";
        $login ="root";
        $password="";
        $db_connection=mysql_connect($server,$login,$password);
        $db_select=mysql_select_db($database);
        $query="SELECT * FROM profiles_tab WHERE id=".(integer)$_GET["ID"];
        $result=mysql_query($query);
        if($result){
        	$item=mysql_fetch_array($result);
        	print_r($query);
        	?>
        	<div class="form-group">
                <form action="bdupdate.php" method="post">
                    
                    <input class="form-control" type='hidden' name='id' value="<?=$item['id']?>">
                     <label>name</label>
                    <input class="form-control" type="text" name="name" value="<?=$item['name']?>" >
                    <label>login</label>
                    <input class="form-control" type="text" name="login" value="<?=$item['login']?>" >
                    <label>password</label>
                    <input class="form-control" type="text" name="password" value="<?=$item['password']?>" >
                    <label>email</label>
                    <input class="form-control" type="text" name="email" value="<?=$item['email']?>" >
                    <label>role</label>
                    <input class="form-control" type="text" name="role" value="<?=$item['role']?>" >
                    <br/>
                	<input class="form-control" type="submit" value="Edit">
                </form>
            </div>
        	<?
        }
    }else{
    	echo"error";
    }?>

