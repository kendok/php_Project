<?php
$pageTitle = 'shop';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';

?>



<br>
<br>


<div id="merch">

            <?php
            $count = 0;
            foreach ($products as $product): ?>
                <table>
                <tr>

        <tr><th colspan="2"><?= $product['productName'] ?>  &euro;<?= $product['productPrice'] ?></th></tr>
        <tr><td rowspan="2"><img class="items" src="<?= $product['productImage'] ?>" alt= "<?= $product['productName'] ?>" ></td></tr>

          </tr>
        </tr>
            <td id = "productButton">
                <a href="index.php?action=product_detail&id=<?= $product['id'] ?> ">
                <button>For more info/purchase click here </button></a>
            </td>
                <?php if($count == 2) : ?>
                </tr>
                    </table>
                    <?php
                $count = 0;
                endif;?>
        <?php
            $count++;
            endforeach; ?>


    </table>



</div>

</form>

<br>
<br>


<?php
require_once __DIR__ . '/_footer.php';
?>
