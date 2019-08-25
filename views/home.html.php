<?php if (is_array($this->posts)) : ?>
<h2>Последние посты</h2>
<ul class="frontposts twocols">
    <?php foreach ($this->posts as $post) : ?>
    <div class="frontwrapper">
        <li class="frontlink">
            <a href="/<?php echo $post->url ?>"><?php echo $post->title; ?></a>
        </li>
    </div>
    <?php endforeach; ?>
</ul>
<?php else : ?>
<p>Нет постов</p>
<?php endif; ?>
<?php if ($this->nextpage): ?>
<div class="row">
    <div class="col-12">
        <a class="btn nextpage" href="/p/<?php echo $this->nextpage;?>">Следующая страница
            &rarr;</a>
    </div>
</div>
<?php endif; ?>