<article>
    <?php echo $this->page->content; ?>
<hr>
<div class="row">
  <div class="col-12">
      <?php if (isset($this->page->customhomepage)): ?>
    <a style="display: block; text-align: center;"
        href="<?php echo $this->page->customhomepage->link?>"><?php $this->page->customhomepage->text?></a>
<?php else: ?>
    <a style="display: block; text-align: center;" href="/">На главную</a>
<?php endif; ?>
  </div>
</div>
</article>