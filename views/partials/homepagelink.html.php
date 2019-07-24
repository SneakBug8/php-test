<div class="row">
  <div class="col-12" style="text-align: center;">
      <?php if ($this->customhomepage): ?>
    <a class="btn-outline" style="display: inline-block; min-width: 40%;"
        href="<?php echo $this->customhomepage->link?>"><?php echo $this->customhomepage->text?></a>
<?php else: ?>
    <a class="btn-outline" style="display: inline-block; min-width: 40%;" href="/">На главную</a>
<?php endif; ?>
  </div>
</div>