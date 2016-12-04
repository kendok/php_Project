
<?php

$pageTitle = 'crud_admin';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';


 if(isset($_SESSION['user']) && $_SESSION['user']== 'admin') :

?>



<table class ="crud">
    <h1>Edit Product List file</h1>
    <tr>
        <th>(detail)</th>
        <th>ID</th>
        <th>product name</th>
        <th>product price</th>
        <th>code</th>
        <th>image</th>
        <th>description</th>

        <th>(update)</th>
        <th>(delete)</th>
    </tr>

    <?php foreach ($products as $product): ?>
        <tr>
            <td>
                <a href="index.php?action=show&id=<?= $product['id'] ?>">
                (detail page)</a>
            </td>
            <td>
                <?= $product['id'] ?>
            </td>
            <td>
                <?= $product['productName'] ?>
            </td>
            <td>
                <?= $product['productPrice'] ?>
            </td>
            <td>
                <?= $product['productCode'] ?>
            </td>
            <td>
                <?= $product['productImage'] ?>
            </td>
            <td>
                <?= $product['productDesc'] ?>
            </td>
            <td>
                <a href="index.php?action=showUpdateProductForm&id=<?= $product['id'] ?>">
                    (UPDATE)</a>
            </td>
            <td>
                <a href="index.php?action=deleteProduct&id=<?= $product['id'] ?>">
                    (DELETE)</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<p>

<form
     action="index.php"
     method="get"
 >
     <input type="hidden" name="action" value="showNewProductForm">
     <input type="submit" value="Create New Product">

 </form>
     <br> <br>
     <br><br>
     <br><br>
     <br><br>

<?php
 else:?> <H1>  GET OUTA HERE YE MESSER</H1>
     <?php
endif;

require_once __DIR__ . '/_footer.php';
?>

