<article>
    <?php $this->partial(viewsPath() . "partials/pagecontent.html.php"); ?>
    <hr>

    <?php
$this->partial(viewsPath() . "/partials/homepagelink.html.php", [
    "customhomepage" => $this->page->customhomepage
]);
?>

</article>