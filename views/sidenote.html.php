<article>
    <?php echo $this->note->content; ?>
    <div class="row mb-3">
        <div class="col-sm-12">
            <div id="vk_like"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php $this->partial(viewsPath() . "/partials/comments.html.php"); ?>
        </div>
    </div>
    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>
    <hr>

    <?php $this->partial(viewsPath() . "partials/postnav.html.php"); ?>

    <?php
  $this->partial(viewsPath() . "/partials/homepagelink.html.php", [
      "customhomepage" => $this->note->customhomepage
  ]);
  ?>
</article>
<script type="text/javascript">
    VK.init({
        apiId: 7003744,
        onlyWidgets: true
    });
    VK.Widgets.Like("vk_like", {
        type: "button",
        height: 30
    });
    VK.Widgets.Comments("vk_comments", {
        limit: 10,
        attach: false,
        autoPublish: 1,
        pageUrl: window.location.href
    }, "{{post._id}}");
</script>