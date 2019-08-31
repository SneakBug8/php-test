<?php $this->partial(viewsPath() . "header.html.php") ?>

<div class="wine"></div>
<div class="published-wrap wrapper note">
	<?php if (!$this->hidehomelink) : ?>
	<h4 id="headhomelink"><a href="/"><?php echo $this->sitename; ?></a></h4>
	<?php endif; ?>
    <h1 class="p-name"><?php echo $this->title; ?></h1>
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
	</article>
</div>

<?php $this->partial(viewsPath() . "footer.html.php") ?>