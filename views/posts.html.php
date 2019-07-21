<?php if (is_array($this->posts)): ?>
    <?php print_r($this->posts); ?>
    <ul>
        <?php foreach ($this->$posts as $key => $post): ?>
            <li>
                <a href="/<?php echo $post->url ?>"><?php echo $post->title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Нет постов</p>
<?php endif; ?>