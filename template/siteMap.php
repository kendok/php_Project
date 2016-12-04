<?php

$pageTitle = 'siteMap';
require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';


?>
<style >@import "/css/siteMap.css";</style>
<br>
	<br>


<h1>Site Map</h1>

    <div class="wrapleft">
	    <div class="siteMapLeft">

    <div id ="sitemap">

		<ul class="sitemapList">
			<li><a href="index.php" class="button">Home</a></li>
			<li><a href="index.php?action=shop" class="button">Shop</a></li>
			<li><a href="index.php?action=contact" class="button">Contact Us</a></li>
			<li><a href="index.php?action=siteMap" class="button">Sitemap</a></li>
			<li><a href="index.php?action=login" class="button">Login</a></li>
			<li><a href="index.php?action=register" class="button">Register</a></li>
			<?php if($isLoggedInAsAdmin) : ?>
				<li><a href="index.php?action=crud"class="button <?$crudLinkStyle ?>"> Crud Admin</a></li>
			<?php endif; ?>
			<?php if(isset($_SESSION['user'])) : ?>
				<li><a href="index.php?action=user_crud"class="button <?$crudLinkStyle ?>"> User Admin</a></li>
			<?php endif; ?>
		</ul>



    </div>

   </div>




		<br>
		<br><br>
		<br><br><br><br><br>
		<br><br><br>
		<br><br>
		<br><br><br><br>
		<br><br>
		<br><br><br><br>






		<?php
	require_once __DIR__ . '/_footer.php';
	?>

