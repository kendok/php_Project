<?php
$pageTitle = 'Register confirmation';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';
?>

<section class="loginform_cf">
    <img src="<?= $user_image ?> " alt="alien" id="alien">   <!--   /images/skin.jpg   -->
<h1>
    Confirmation of registration
</h1>

<p>
    Attempt to register username: <?= $user_name ?>
</p>

<p>
    <?= $message ?>

</p>
</section>

<br>
<br><br>
<br><br><br><br>
<br>
<br><br>

<?php
require_once __DIR__ . '/_footer.php';
?>

