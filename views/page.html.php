<article>
    <?php echo $this->page->content; ?>
    <hr>

    <?php
$this->customhomepage = $this->page->customhomepage;
$this->partial(viewsPath() . "/partials/homepagelink.html.php");
?>

</article>