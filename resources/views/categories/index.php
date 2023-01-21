

<h2>News categories</h2>
<?php foreach($categories as $n):  ?>
    <div style="border: 1px solid green">
        <p><?=$n['caption']?></p>
        <a href="<?=route('news.category',['category_id'=> $n['category_id']])?>">News</a>
    </div>
<?php endforeach ?>

