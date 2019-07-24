<div class="row mb-1">
  <div class="col-sm-12 col-md-6">
    <?php if ($this->post->previous): ?>
    <a class="btn" style="display: block; width: 100%; height: 100%;" href="/<?php echo $this->post->previous->url; ?>">
      &larr; <?php echo $this->post->previous->title; ?>
    </a>
    <?php endif; ?>
  </div>
  <div class="col-sm-12 col-md-6">
    <?php if ($this->post->next): ?>
    <a class="btn" style="display: block; width: 100%; height: 100%;" href="/<?php echo $this->post->next->url; ?>">
      <?php echo $this->post->next->title; ?> &rarr;
    </a>
    <?php endif; ?>
  </div>
</div>