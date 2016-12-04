
<?php

$pageTitle = 'message';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';




?>

<section class="loginform_cf">
<h1>
    Message
</h1>

<p>
    <?= $message ?>
</p>

<?php if(isset($_SESSION['user'])|| $_SESSION['user']= 'admin') : ?>
<p>
  <strong> Your changes have been successful <?= ($_SESSION['user'])  ?>: </strong>
    <img class="items" src="<?= $_SESSION['user_image']  ?>" alt="new image">
</p>
<?php endif; ?>
</section>

<br><br>
<br><br>
<br><br>
<br><br>
<br><br>


<br>
<br>
<?php
require_once __DIR__ . '/_footer.php';
?>

