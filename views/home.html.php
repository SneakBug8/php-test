<?php if (is_array($this->posts)) : ?>
    <ul class="frontposts">
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