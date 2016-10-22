<head>
	<?php /* Base meta (View port, encoding, etc.) */ ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="HandheldFriendly" content="true">

	<?php /* Icons (Favicon, apple home icon, etc.) */ ?>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" sizes="16x16 24x24 32x32 64x64"/>

	<?php /* Title */ ?>
	<title><?=$CONFIG->site_name?></title>

	<?php /* Generic */ ?>
	<meta name="description" content="<?=$CONFIG->site_name?>">

	<?php /* Microsoft */ ?>
	<meta name="application-name" content="PXIMG"/>
	<meta name="msapplication-TileColor" content="<?=$CONFIG->site_colour?>"/>
	<meta name="msapplication-TileImage" content="/square.png"/>

	<?php /* Apple (Ugh, piece of shite) */ ?>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="<?=$CONFIG->site_colour?>">
	<meta name="apple-mobile-web-app-title" content="<?=$CONFIG->site_name?>">

	<?php /* Chrome Mobile */ ?>
	<meta name="theme-color" content="<?=$CONFIG->site_colour?>">

	<?php /* Stylesheet */ ?>
	<link rel="stylesheet" type="text/css" href="/assets/css/screen.css">

	<?php /* Other (Chrome, etc.) */ ?>
	<link rel="manifest" href="/manifest.json">
	<script type="text/javascript" href="https://code.jquery.com/jquery-3.1.0.min.js"></script>
</head>
