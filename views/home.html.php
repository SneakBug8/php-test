<?php $this->partial(viewsPath() . "header.html.php") ?>

<div class="head">
    <h4 id="headhomelink">Проект Наконечного Павла</h4>
    <h1 class="p-name"><?php echo $this->title; ?></h1>
    <p class="full-width lead">Пишем про веб-разработку, фронтенд и бекенд,  проект-менеджмент и экономику сайтов рунета.</p>
    <img src="https://i.postimg.cc/sX3ZMH2t/image.png">
</div>

<div class="published-wrap wrapper note">
    <article>
        <?php
        if (is_string($this->innerview)) {
            $this->partial($this->innerview);
        }
        if (is_array($this->innerviews)) {
            foreach ($this->innerviews as $innerview) {
                if (is_string($innerview)) {
                    $this->partial($innerview);
                }
            }
        }
        ?>

        <?php if (is_array($this->posts)) : ?>
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

    </article>
</div>

<?php $this->partial(viewsPath() . "footer.html.php") ?>