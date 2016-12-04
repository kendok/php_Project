<?php
$pageTitle = 'contact';

require_once __DIR__ . '/_head.php';
require_once __DIR__ . '/_nav.php';


?>



       <div id="wrapper">
    <!-- ** DIV - col1 ** -->
           <br>
           <br>
           <br>
	<div id="twocol1">
			<h1>Contact Us</h1>
			<form id="comment_form" class="registration" >
				<h2>Leave a Comment</h2>
				<label for="name" class="req">Name :</label>
				<br>
				<input type="text" name="name" id="name" pattern="[A-Za-z\s]+" placeholder="First name and/or Last name"  title="Please enter first and/or last name separated by a space" required tabindex="1" autofocus autocomplete="on" onBlur="checkEmpty('name')">
				<p class="error_par" id="err_name"></p>

				<br>

				<label for="email" class="req">Email :</label>
				<br>
				<input type="email" name="email" id="email" placeholder="someone@example.ie" title="Valid email address - format eg. youraddress@sitename.com" pattern="[a-z0-9\.]+@+[a-z0-9\.]+\.+[a-z0-9]+" autocomplete="on" tabindex="6" onBlur="checkEmpty('email')" required>
				<p class="error_par" id="err_email"></p>

				<br>

				<label for="comments" class="large_label req">Comments :</label>
				<br>
				<textarea name="comments" id="comments" placeholder="Comments / Questions" required></textarea><br>
				Priority:<input type="range" name="points" min="0" max="10"><br>
				<input type="submit" name="submit_comment" id="submit_comment" value="Send" onClick="checkEmpty('name'), checkEmpty('email'), checkEmpty('comments')"> <br>

			</form>




		</div>
		
        
		<!-- ** DIV - col2 ** -->
		<div id="twocol2">
			<h3>Post</h3>
			<p>
				The -X- Files <br>
				Area 51<br>
				Nevada<br>
				Co. not real place
			</p>
			<h3>Phone/Fax</h3>
			<p>
				Phone: (087)123 4567<br>
				Fax  : (087)123 4568<br>
			</p>
			<h3>E-mail</h3>
			<p>
				E-mail: <a href="mailto:B00091252@student.itb.ie">B00091252@student.itb.ie</a>
			</p>
		</div>
	</div>





<br><br>
<br><br><br><br>











	<?php
	require_once __DIR__ . '/_footer.php';
	?>
