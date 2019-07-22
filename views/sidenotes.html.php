<article>
    <?php if (isset($this->notes)): ?>
    <ul style="list-style: none;">
        <?php foreach($this->notes as $note): ?>
        <li><?php echo $note->url; ?>&nbsp;&nbsp;<a href="/sidenotes/<?php echo $note->url; ?>"><?php echo $note->title; ?></a></li>
<?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Нет заметок</p>
<?php endif;?>
</article>
<hr>
<div class="row">
    <div class="col-12">
        <a style="display: block; text-align: center;" href="/">На главную</a>
    </div>
</div>