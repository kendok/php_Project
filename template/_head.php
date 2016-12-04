<?php

//var_dump($_SESSION);
?>
<!DOCTYPE html>

<html lang="en">
<link rel="icon" href="/images/xlogo.png">			<!-- "../images/xlogo.png">  ../public/images/xlogo.png  -->
<head>
	<title>The -X-Files - <?= $pageTitle ?> </title>
	<meta charset="utf-8">

	<style>

		<?= $cssStyleRule ?>

			body {
				background-color: <?= $backgroundColor ?>;

			}
	</style>

	<!----                   CSS below this --->
	<link rel="stylesheet" type="text/css" href="/css/topRight.css">
	<link rel="stylesheet" type="text/css" href="/css/contactUs.css">
	<link rel="stylesheet" type="text/css" href="/css/login.css">

	<link rel="stylesheet" type="text/css" href="/css/imageSlide.css">
	<link rel="stylesheet" type="text/css" href="/css/basic.css">
	<link rel="stylesheet" type="text/css" href="/css/nav.css">
	<link rel="stylesheet" type="text/css" href="/css/shop.css">
	<link rel="stylesheet" type="text/css" href="/css/login.css">
	<script src ="/js/mainJS.js"></script>
</head>



<body onLoad="photoA()">



<!--********************************* container ********    **************************-->
<div id="container">
<!--********************************* header **********************************-->
<div id="top">
<img src="/images/Logo.jpg" alt="kens logo" >




     <h1> The-X-Files</h1>
	</div>

	<div id="topright">
		<div class="cart_login">
			<?php if(isset($_SESSION['user'])&& $_SESSION['user']!= 'admin') : ?>
			<a href="index.php?action=cart"><img src="/images/basket.png" alt="basket" id="basket">Cart</a>
			<?php endif; ?>

			<?php
			//----------------------------
			if($this->is_logged_in_from_session()):
				//----------------------------
				?>
				You are logged in as: <strong><?=(isset($_SESSION['user']))? $_SESSION['user'] : ''; ?></strong>

				<a href="/index.php?action=logout">(logout)</a><img src="/images/xlogo2.png" alt="login" id="basket"></a>
				<?php
			//----------------------------
			else:
				//----------------------------
				?>
				<a href="/index.php?action=login">login</a><img src="/images/xlogo2.png" alt="login" id="basket"></a>
				<?php
				//----------------------------
			endif;
			//----------------------------
			?>

		</div>

    </div>
