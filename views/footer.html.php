<div class="published-wrap mb-5">
		<?php echo $this->footer; ?>
	</div>
</body>

<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140928369-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());
	gtag('config', 'UA-140928369-1');
	setTimeout(function () {
		ga('send', 'event', 'read', '15_seconds');
	}, 15000);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cash/4.1.2/cash.min.js"></script>
<script src="/static/script.js"></script>

</html>