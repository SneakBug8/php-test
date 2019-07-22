<article>
    <?php echo $this->post->content ?>
  <div class="row mb-3">
    <div class="col-sm-12">
        <?php if (isset($this->post->date)): ?>
      <i id="date">Опубликовано <?php echo $this->post->date; ?></i>
<?php endif; ?>
<?php if (isset($this->post->tags)): ?>
<?php foreach ($this->post->tags as $tag): ?>
      <i><a href="/tag/<?php echo $tag?>">#<?php echo $tag?></a></i>
<?php endforeach; ?>
<?php endif; ?>

      <div id="vk_like"></div>
    </div>
  </div>
  <div class="row" id="comments">
    <div class="col-sm-12">
      <div id="vk_comments"></div>
    </div>
  </div>
  <script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>
  <hr>
  <?php $this->partial(__DIR__ . "/partials/postnav.html.php"); ?>
  <div class="row">
    <div class="col-12" style="text-align: center">
    <?php if (isset($this->post->customhomepage)): ?>
    <a style="display: block; text-align: center;"
        href="<?php echo $this->post->customhomepage->link?>"><?php $this->post->customhomepage->text?></a>
<?php else: ?>
    <a style="display: block; text-align: center;" href="/">На главную</a>
<?php endif; ?>
    </div>
  </div>
</article>
<script type="text/javascript">
  VK.init({ apiId: 7003744, onlyWidgets: true });
  VK.Widgets.Like("vk_like", { type: "button", height: 30 });
  VK.Widgets.Comments("vk_comments", { limit: 10, attach: "*", autoPublish: 1, pageUrl: window.location.href }, "{{post._id}}");
</script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/styles/vs.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.8/highlight.min.js"></script>
<script async>hljs.initHighlightingOnLoad();</script>