
<?php

$pageTitle = 'Login';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';




?>



<section class="loginform_cf">

    <!-- ********************* error message ******************* -->
    <?php if(!empty($errorMessage)): ?>
        <p class="error"><?= $errorMessage ?></p>
    <?php endif; ?>

    <form name="login" action="index.php?action=process_login" method="POST" >
        <h1>Please Login or <a href="index.php?action=register">Register</a></h1>

        <?php if(!empty($loginMessage)): ?>
            <p><?= $loginMessage ?></p>
        <?php endif; ?>

        <label for="user_name">Username:</label>
        <input type="text" name="user_name" placeholder="Username  " required>

        <label for="password">Password :</label>
        <input type="password" name="password" placeholder="password" required></li>

        <input type="submit" value="Login">
    </form>
</section>

<br>
<br><br>
<br><br><br><br>
<br>
<br><br><br><br>
<br><br><br><br>

<br><br><br><br><br>
<?php
require_once __DIR__ . '/_footer.php';
?>

