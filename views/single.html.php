  <?php echo $this->post->content ?>
  <div class="post-meta">
      <?php if (isset($this->post->date)): ?>
      <i id="date">Опубликовано <?php echo $this->post->date; ?></i>
      <?php endif; ?>
      <?php if ($this->post->tags): ?>
      <br>
        <?php foreach ($this->post->tags as $tag): ?>
        <i><a href="/tag/<?php echo $tag?>">#<?php echo $tag?></a></i>
        <?php endforeach; ?>
      <?php endif; ?>
      <?php $this->partial(viewsPath() . "partials/likes.html.php"); ?>
  </div>
  <div class="row" id="comments">
    <div class="col-sm-12 col-md-6">
      <?php  $this->partial(viewsPath() . "/partials/homepagelink.html.php", [
    "customhomepage" => $this->post->customhomepage
  ]);  ?>
    </div>
    <div class="col-sm-12 col-md-6">
      <?php $this->partial(viewsPath() . "partials/tglink.html.php"); ?>
      <?php $this->partial(viewsPath() . "partials/comments.html.php"); ?>
    </div>
  </div>
  <?php
  $this->nav = (object) [
    "previous" => $this->post->previous,
    "next" => $this->post->next
  ];
  $this->partial(viewsPath() . "/partials/postnav.html.php");
  ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/vs.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
<script async>
  hljs.initHighlightingOnLoad();
</script>