<?if($data){?>
<pre>!!!<?print_r($_COOKIE['username'])?>!!!</pre>

<div class="form-group">
<? if($_SESSION["authorized"]=='Y' ){?>
   <p> <b><?=$_SESSION["username"]?></b> <a href="/authorization/index.php?logout=Y">Exit</a> </p>
<?}
  if($_SESSION["authorized"]!='Y' )
        {?>
              <a href="/authorization/index.php">Enter</a>
        <?}?>

 
<?foreach ($data as $item ) {?>
	

    <h1><?=$item["title"]?></h1>
    <div>
        <p>
            <?=$item["article_text"]?>
            <p>
        </div>
    <div>
        <b>
            <?=$item["author_name"]["name"]?>
        </b></div>
        <? if($_SESSION["authorized"]=='Y' && $_SESSION["userid"]==$item["author_name"]["id"] )
        {?>
        <a href="/article/index.php?edit=<?=$item["id"]?>">edit article</a>
        <?}?>

        <?}?>
     <?} ?>
</div>