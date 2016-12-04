<?php
$pageTitle = 'Login confirmation';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';
?>

<section class="loginform_cf">
    <img src="/images/skin.jpg" alt="alien" id="alien">
    <h1>
        Were Sorry  <?= $user_name ?>
    </h1>

    <p>
        It appears that <?= $user_name ?> is not permitted to enter this area.
    </p>

    <p>
        <?= $loginmessage1 ?>

    </p>
</section>




<?php
require_once __DIR__ . '/_footer.php';
?>

