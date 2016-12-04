<?php

if(!isset($indexLinkStyle)){
    $indexLinkStyle = '';
}

if(!isset($shopLinkStyle)){
    $shopLinkStyle = '';
}

if(!isset($contactLinkStyle)){
    $contactLinkStyle = '';
}

if(!isset($sitemapLinkStyle)){
    $sitemapLinkStyle = '';
}
if(!isset($crudLinkStyle)){
    $crudLinkStyle = '';
}


if(!isset($isLoggedInAsAdmin)){
    $isLoggedInAsAdmin = false;
}
if(!isset($isLoggedInAsAUser)){
    $isLoggedInAsUser = false;
}




?>
<!--***************************************************Nav********************************************-->
      <div class="nav">
         <ul>
            <li><a href="index.php" class="button <?= $indexLinkStyle ?>">Home</a></li>
            <li><a href="index.php?action=shop" class="button <?= $shopLinkStyle ?>">Shop</a></li>
            <li><a href="index.php?action=contact" class="button <?= $contactLinkStyle ?>">Contact Us</a></li>
            <li><a href="index.php?action=siteMap" class="button <?= $sitemapLinkStyle ?>">Sitemap</a></li>

             <?php if(isset($_SESSION['user'])&& $_SESSION['user']!= 'admin') : ?>         <!--    -->
                 <li><a href="index.php?action=user_crud"class="button <?$crudLinkStyle ?>"> Edit Account</a></li>
             <?php endif; ?>
             <?php if($isLoggedInAsAdmin) : ?>
                 <li><a href="index.php?action=crud"class="button <?$crudLinkStyle ?>"> Crud Admin</a></span></li>
             <?php endif; ?>
         </ul>
    </div>
	<!-- *** DIV - transparent_background 1 (grey centered behind content)*** -->
<div class="transparent_background1">

</div>

<!-- *** DIV - transparent_background 2 (black at bottom of window)*** -->
<div class="transparent_background2">

</div>

<br>
