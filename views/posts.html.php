<?php if (is_array($this->posts)): ?>
    <ul>
        <?php foreach ($this->$posts as $post): ?>
            <li>
                <a href="/<?php echo $post->url ?>"><?php echo $post->title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>Нет постов</p>
<?php endif; ?>