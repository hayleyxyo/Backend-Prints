<?php if(!$confirmation): ?>
	<script type="text/javascript">
		var password,confirmPassword;
		window.onload=function() {
			password=document.getElementById('password');
			confirmPassword=document.getElementById('confirm');
			document.getElementById('showpassword').onclick=function () {
				password.type = this.checked ? 'text' : 'password';
				confirmPassword.type = this.checked ? 'text' : 'password';
			};
		};
	</script>
	<form method="post" action="" id="register">
		<fieldset>
			<legend>User Registration</legend>
			<?php print @$errors; ?>
			<p><label class="adjacent">First Name<br>
				<input type="text" name="givenname" value="<?php print @$givenname; ?>"></label>
				<label class="adjacent">Last Name<br>
				<input type="text" name="familyname" value="<?php print @$familyname; ?>"></label></p>

			<p class="clear"><label>Email<br>
				<input type="text" name="email" value="<?php print @$email; ?>"></label></p>

			<!-- if logged in, assume change details -->
				<!-- old password -->
			<!-- endif (assume new) -->
			<fieldset>
				<legend>Password</legend>
				<p>Enter a new password. Your password should:</p>
				<ul>
					<li>be at least 8 characters long</li>
					<li>include an UPPER CASE letter</li>
					<li>include a lower case letter</li>
					<li>include a numeral</li>
				</ul>
				<p class="clear">
					<label class="adjacent">Password<br><input type="password" id="password" name="password"></label>
					<label class="adjacent">Confirm Password<br><input type="password" id="confirm" name="confirm"></label>
					<p><label><input type="checkbox" id="showpassword"> Show Password</label></p>
			</fieldset>

		<p class="clear">
		<!-- if not logged in, assume insert -->
			<button type="submit" name="register">Register Me</button>
		<!-- else assume change details -->
			<!-- update button -->
		<!-- endif -->
		</p>

		</fieldset>
		<p><a href="/">Cancel Registration &amp; Go Back</a></p>
	</form>

<?php else: ?>

	<form method="post" action="" id="register">
		<fieldset>
			<legend>Confirm Registration</legend>
			<input type="-hidden" name="confirmation" value="<?php print $confirmation?>">
			<p class="clear"><label>Email<br>
				<input type="text" name="email" value="<?php print $email; ?>"></label></p>
			<p class="clear"><label>Password<br>
				<input type="password" name="password"></label></p>
			<p><input type="submit" name="doconfirmation" value="Confirm Registration"></p>
		</fieldset>
		<p><a href="/">Cancel Registration &amp; Go Back</a></p>
	</form>

<?php endif; ?>
