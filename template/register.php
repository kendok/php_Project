
<?php

$pageTitle = 'Register';
require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';

?>


<section class="loginform_cf">

    <!-- ********************* error message ******************* -->
    <?php if(!empty($errorMessage)): ?>
        <p class="error"><?= $errorMessage ?></p>
    <?php endif; ?>

    <h1>Please Register below or <a href="index.php?action=login">Login</a></h1>

    <form name="login" action="index.php?action=process_registration" method="POST" >
                <label for="user_name">Username :</label>
                <input type="text" name="user_name" placeholder="User Name" >

                <label for="user_image">Path to image</label>
                <input type="text" name="user_image" placeholder="images/mattSmith.jpg" >

                <label for="password">Password :</label>
                <input type="password" name="password" placeholder="password" >

                <label for="confpassword">Confirm Password :</label>
                <input type="Password" name="confirm_password" placeholder="Confirm Password" >

                <input type="submit" value="Create">
    </form>
</section>
<br>
<br><br>

        <?php
        require_once __DIR__ . '/_footer.php';
        ?>

