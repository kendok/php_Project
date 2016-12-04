<?php

$pageTitle = 'new product form';
require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';

?>


<h1>Update product</h1>

<form
    action="index.php?action=updateProduct"
    method="POST"
>
    <!-- ****** send ID, but don't let user see this ***** -->
    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <p>
        <label>Name:</label>
        <input type="text" name="productName" value="<?= $product['productName'] ?>">
    </p>

    <p>
        <label>Price:</label>
        <input type="text" name="productPrice" value="<?= $product['productPrice'] ?>">
    </p>


    <p>
        <label>Product code:</label>
        <input type="text" name="productCode" value="<?= $product['productCode'] ?>">
    </p>

    <p>
        <label>Product image:</label>
        <input type="text" name="productImage" value="<?= $product['productImage'] ?>">
    </p>
    <p>
        <label>Product description:</label>
        <input type="text" name="productDesc" value="<?= $product['productDesc'] ?>">
    </p>

    <input type="submit" value="Update Product">

</form>







<?php
require_once __DIR__ . '/_footer.php';
?>

