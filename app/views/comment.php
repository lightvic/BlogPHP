<?php foreach ($comments as $comment): ?>
    <p> <?php $comment ?> </p>
<?php endforeach; ?>
<form action="/comment/add/<?= $post_id ?>" method="post">
    <textarea id="content" name="content" type="text"></textarea><br>
    <button type="submit" id="submitComment">Valider</button>
</form>