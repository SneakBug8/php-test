<div class="row mb-1">
  <div class="col-sm-12 col-md-6">
    <?php if ($this->previous): ?>
    <a class="btn" style="display: block; width: 100%; height: 100%;"
    href="/<?php echo $this->previous->url; ?>">
    &larr; <?php echo $this->previous->title; ?>
</a>
<?php endif; ?>
  </div>
  <div class="col-sm-12 col-md-6">
  <?php if ($this->next): ?>
    <a class="btn" style="display: block; width: 100%; height: 100%;"
    href="/<?php echo $this->next->url; ?>">
    <?php echo $this->next->title; ?> &rarr;
</a>
<?php endif; ?>
  </div>
</div>