<article>
    <?php echo $this->page->content; ?>
    <hr>

    <?php
$this->partial(viewsPath() . "/partials/homepagelink.html.php", [
    "customhomepage" => $this->page->customhomepage
]);
?>

</article>