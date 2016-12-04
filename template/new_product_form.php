<?php

$pageTitle = 'new product form';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';


?>


<h1>Create a new product</h1>

<form
    action="index.php?action=createNewProduct"
    method="POST"
>

    <p>
        <label>Name:</label>
        <input type="text" name="productName">
    </p>
    <p>
        <label>Price:</label>
        <input type="text" name="productPrice">
    </p>

    <p>
        <label>Product code:</label>
        <input type="text" name="productCode">
    </p>

    <p>
        <label>Product image:</label>
        <input type="text" name="productImage">
    </p>
    <p>
        <label>Product description:</label>
        <input type="text" name="productDesc">
    </p>

    <input type="submit" value="Create New Product">

</form>



<?php
require_once __DIR__ . '/_footer.php';
?>

