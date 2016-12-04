<?php

$pageTitle = 'User Edit';
require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';

?>
<section class="loginform_cf">
<h1>Update Image for user :</h1>

<form
    action="index.php?action=updateUser"
    method="POST"
>
    <input type="hidden" name="id" value="<?= $id ?>"> <!--  -->

    <p>
        <label>Edit your picture : </label>
        <input type="text" name="user_image" placeholder="images/mattSmith.jpg" value="<?= $user_image  ?>">
    </p>
    <input type="submit" value="Update User Image">
  <h1> Change the Background colour of the site :</h1>
    <ul>
        <li>
            <a href="/index.php?action=setBackgroundColorYellowgreen">Yellow green</a>
        </li>

        <li>
            <a href="/index.php?action=setBackgroundColorLightgreen">Light green</a>
        </li>
        <li>
            <a href="/index.php?action=setBackgroundColorLightgrey">Back to normal</a>
        </li>
    </ul>





            <h1>Edit your css : </h1>

    <ul>
        <li>
            <a href="/index.php?action=colorRed">Text color = RED</a>
        </li>

        <li>
            <a href="/index.php?action=colorBlue">Text color = BLUE</a>
        </li>

        <li>
            <a href="/index.php?action=sizeOne">Text size = 1rem</a>
        </li>

        <li>
            <a href="/index.php?action=sizeOnePointTwo">Text size = 1.2rem</a>
        </li>
        <li>
            <a href="/index.php?action=killSession">Kill session (reset to defaults & you will be logged out)</a>
        </li>
    </ul>

</section>


    <br><br>
    <br><br>
<br><br>
<br><br>





</form>













<?php
require_once __DIR__ . '/_footer.php';
?>

