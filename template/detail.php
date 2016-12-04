

<?php


$pageTitle = 'show details of one product';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';




?>

<h1>Details of one product</h1>
<table>
<dl>
    <dt>ID</dt>
    <dd><?= $product['id'] ?></dd>

    <dt>Name</dt>
    <dd><?= $product['productName'] ?></dd>

    <dt>Product Price</dt>
     <dd> €<?= $product['productPrice'] ?></dd>
    <dt>Product Code</dt>
     <dd> <?= $product['productCode'] ?></dd>
    <dt>Product Image</dt>
     <dd> <img class="items" src="<?= $product['productImage'] ?>" </dd>
    <dt>Product Description</dt>
     <dd><?= $product['productDesc'] ?></dd>


</dl>
</table>

<?php
require_once __DIR__ . '/_footer.php';
?>

