<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	<meta name="referrer" content="origin">
	<title><?php echo $this->titlePrefix . $this->title . $this->titlePostfix ?></title>
	<meta property="og:title" content="<?php echo $this->title; ?>" />
	<meta property="og:type" content="article" />
	<?php if ($this->$desctiption) : ?>
	<meta name="description" content="<?php echo $this->description; ?>">
	<meta property="og:description" content="<?php echo $this->description; ?>">
	<?php endif; ?>
	<?php if ($this->sitename) : ?>
	<meta property="og:site_name" content="<?php echo $this->sitename; ?>">
	<?php endif; ?>
	<?php if ($this->image) : ?>
	<meta property="og:image" content="<?php echo $this->image; ?>" />
	<?php endif; ?>
	<link rel="apple-touch-icon" sizes="57x57" href="/fav/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/fav/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/fav/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/fav/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/fav/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/fav/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/fav/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/fav/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/fav/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="/fav/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/fav/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/fav/favicon-16x16.png">
	<link rel="manifest" href="/fav/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/fav/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link rel="shortcut icon" type="image/x-icon" sizes="16x16 32x32 64x64" href="/fav/favicon.ico" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap-grid.min.css"
		crossorigin="anonymous">
	<link href="/static/style.css?ver=2" media="all" rel="stylesheet" type="text/css">
</head>

<body>
	<ul class="headernav">
		<li><a href="javascript:undefined" id="themebutton" title="Тёмная тема">🌙</a></li>
		<li><a class="md-only" href="/">🏠</a></li>
		<li><a href="/about">Обо мне</a></li>
		<li><a href="/turnkey-websites">Сайты на заказ</a></li>
		<li><a class="md-only" href="/services">Услуги</a></li>
		<li><a href="/portfolio">Портфолио</a></li>
		<li><a class="md-only" href="/sidenotes">Заметки на полях</a></li>
		<li><a class="lg-only" href="https://vk.com/sb8blog">ВКонтакте</a></li>
		<li><a class="lg-only" href="https://t.me/sb8blog">Telegram</a></li>
	</ul>
	<div class="published-wrap wrapper note">
		<?php if (!$this->hidehomelink) : ?>
		<h4 id="headhomelink"><a href="/"><?php echo $this->sitename; ?></a></h4>
		<?php endif; ?>
		<h1 class="p-name"><?php echo $this->title; ?></h1>
		<article>
			<?php
        if (is_string($this->innerview)) {
            $this->partial($this->innerview);
        }
        if (is_array($this->innerviews)) {
            foreach ($this->innerviews as $innerview) {
                if (is_string($innerview)) {
                    $this->partial($innerview);
                }
            }
        }
        ?>
		</article>
	</div>
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