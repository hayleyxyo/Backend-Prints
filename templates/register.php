<!-- if confirmation: $_GET['confirmation'] -->

	<form method="post" action="" id="register">
		<fieldset>
			<legend>Confirm Registration</legend>
			<p class="clear"><label>Email<br>
				<input type="text" name="email" value="<?php print @$_GET['email']; ?>"></label></p>
			<p class="clear"><label>Email<br>
				<input type="text" name="confirmation" value="<?php print @$_GET['confirmation']; ?>"></label></p>
			<p><input type="submit" name="doconfirmation" value="Confirm Registration"></p>
		</fieldset>
		<p><a href="/">Cancel Registration &amp; Go Back</a></p>
	</form>

<!-- else -->

	<form method="post" action="" id="register">
		<fieldset>
			<legend>User Registration</legend>
<!-- error: $errors -->
			<p><label class="adjacent">First Name<br>
				<input type="text" name="givenname" value="[givenname]"></label>
				<label class="adjacent">Last Name<br>
				<input type="text" name="familyname" value="[familyname]"></label></p>

			<p class="clear"><label>Email<br>
				<input type="text" name="email" value="[email]"></label></p>

			<!-- if logged in, assume change details -->
				<!-- old password -->
			<!-- endif (assume new) -->
			<p class="clear">
				<label class="adjacent">Password<br><input type="password" name="password"></label>
				<label class="adjacent">Confirm Password<br><input type="password" name="confirm"></label>
			</p>

		<p class="clear">
		<!-- if not logged in, assume insert -->
			<input type="submit" name="insert" value="Register Me">
		<!-- else assume change details -->
			<!-- update button -->
		<!-- endif -->
		</p>

		</fieldset>
		<p><a href="/">Cancel Registration &amp; Go Back</a></p>
	</form>

<!-- endif -->
