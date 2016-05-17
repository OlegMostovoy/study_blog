<? if($data){
        	?>
        	<div class="form-group">
                <form action="index.php" method="post">
                    
                    <input class="form-control" type='hidden' name='id' value="<?=$data['id']?>">
                     <label>name</label>
                    <input class="form-control" type="text" name="name" value="<?=$data['name']?>" >
                    <label>login</label>
                    <input class="form-control" type="text" name="login" value="<?=$data['login']?>" >
                    <label>password</label>
                    <input class="form-control" type="text" name="password" value="<?=$data['password']?>" >
                    <label>email</label>
                    <input class="form-control" type="text" name="email" value="<?=$data['email']?>" >
                    <label>role</label>
                    <input class="form-control" type="text" name="role" value="<?=$data['role']?>" >
                    <br/>
                	<input class="form-control" type="submit" value="Edit">
                </form>
            </div>
        	<?
    }else{
    	echo"error";
    }?>