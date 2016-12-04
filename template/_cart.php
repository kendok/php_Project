<?php

$pageTitle = 'cart';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';


?>



<h1>Shopping cart</h1>
<table  border = 1 bgcolor="#98fb98">
    <tr>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>sub-total</th>
        <th>(remove)</th>
    </tr>
<?php
//-----------------------------
$total = 0;
$productrp = new \Itb\ProductRepository();

foreach($shoppingCart as $id=>$quantity):

    $products = $productrp->get_one_product($id);
    $price = $products['productPrice'];
    $subTotal = $price * $quantity;
    $total += $subTotal;
//-----------------------------
?>

    <tr>
    <td><?= $products['productName'] ?></td>
    <td>&euro; <?= $price ?></td>
    <td><?= $quantity ?></td>
    <td><?= $subTotal ?></td>
    <td><a href="/index.php?action=removeFromCart&id=<?= $products['id'] ?>"><button>(remove from cart)</button></a></td>

    </tr>

<?php
//-----------------------------
endforeach;
//-----------------------------
?>

    <tr>
        <td colspan="3">Total</td>
        <td>&euro; <?= $total ?></td>
    </tr>

</table>

<a href="/index.php?action=emptyCart" class="button" ><button> EMPTY CART</button></a>



<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>


<?php
require_once __DIR__ . '/_footer.php';
?>

