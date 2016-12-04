<?php
$pageTitle = 'Login confirmation';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';
?>

<section class="loginform_cf">
    <img src="<?= $user_image ?>" alt="alien" id="alien">
    <h1>
        Confirmation of Login
    </h1>

    <p>
          You have just logged in <?= $user_name ?>
    </p>

    <p>
    <?= $loginmessage ?>
    </p>
</section>

<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br><br><br>

<br><br>


<?php
require_once __DIR__ . '/_footer.php';
?>

