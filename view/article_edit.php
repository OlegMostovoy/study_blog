<link rel='stylesheet' href='/css/bootstrap/css/bootstrap.min.css' type='text/css' media='all'>

<div class="col-md-6 col-sm-3 vcenter">
<div class="center-block">
   <?if($data){?>
    <form action="../article/index.php" method="post">
         <input type="hidden"  name="id" value="<?=$data["id"]?>">
        <div class="form-group row">
            <fieldset class="form-group">
    	        <label >title</label>
    	        <input type="text" name="title" value="<?=$data["title"]?>" class="form-control">
    	    </fieldset>
    
    	    <fieldset class="form-group">
    	        <label >article text</label>
    	        <input type="textarea" name="article_text" value="<?=$data["article_text"]?>" class="form-control">
    	    </fieldset>
    
    	    <fieldset class="form-group">
    	        <label >author</label>

    	        <select size="<?=count($data["authors"]);?>" name="author" class="form-control">
    	        <?foreach ($data["authors"] as $value) 
    	        {?>
    	        	<option value="<?=$value["id"]?>"><?=$value["name"]?></option>
    	        <?}?>	
    	        </select>
    	    </fieldset>
            <fieldset class="form-group">
    	    <input type="submit" value="submit">
    	    </fieldset>
    	</div>
    </form>
    <?}else{?>
    <p>Data error!</p>
    <?}?>
</div>
</div>
