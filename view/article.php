<?if($data){?>

<?} ?>
<div class="form-group">
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
        <a href="/article/index.php?edit=<?=$item["id"]?>">edit article</a>

        <?}?>
</div>