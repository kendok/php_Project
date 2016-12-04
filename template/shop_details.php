

<?php


$pageTitle = 'product';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';




?>
<section class="loginform_cf">
<h1>Details of one product</h1>

<dl >

    <dt><b>Name</b></dt>
    <dd><?= $product['productName'] ?></dd>
    <dt><b>Product Price</b></dt>
    <dd> € <?= $product['productPrice'] ?></dd>
    <dt><b>Product Code</b></dt>
    <dd> <?= $product['productCode'] ?></dd>
    <dt><b>Product Image</b></dt>
    <dd> <img class="items" src="<?= $product['productImage'] ?>"</dd>
    <dt><b> Description</b></dt>
    <dd><?= $product['productDesc'] ?></dd>
    <?php if(isset($_SESSION['user'])&& $_SESSION['user']!= 'admin') : ?>
    <dd id =buyButton>
    <a href="/index.php?action=addToCart&id=<?= $product['id'] ?>"><button>add to cart</button></a> </dd>
    <?php endif; ?>
    <br><br>
    <?php if(!isset($_SESSION['user'])) : ?>
      <dt> <strong>If you like this item you should <a href="/index.php?action=login">Login </a> or if you don't have an account <a href="index.php?action=register">Register</a> to complete your purchase.  </strong> </dt>
    <?php endif; ?>

    <?php if(isset($_SESSION['user'])== 'admin'&& !$_SESSION['user']) : ?>
        <dt> <strong>You don't need to buy your own Products to make a living!!</strong> </dt>
    <?php endif; ?>

</dl>
</section>

<br>
<br>





<?php
require_once __DIR__ . '/_footer.php';
?>

