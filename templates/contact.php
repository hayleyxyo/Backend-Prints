<!-- Two Stage Contact Form -->

<!-- Stage 1: if Compose: !@$send -->
	<form id="contact" method="post" action="">
		<?php if(@$error): ?>
			<fieldset>
				<legend>Contact Error</legend>
				<?php print $error; ?>
			</fieldset>
		<?php endif; ?>
		<fieldset class="write">
			<legend>Compose Message</legend>
			<p style="display: none"><label><input type="checkbox" name="honeypot"> I am a spambot</label></p>
			<p><label>Name<br><input type="text" name="name" value="<?php print @$name; ?>" required autofocus></label></p>
			<p><label>Email<br><input type="email" name="email" value="<?php print @$email; ?>" required></label></p>
			<p><label>Subject<br><input type="text" name="subject" value="<?php print @$subject; ?>" required></label></p>
			<p><label>Message<br><textarea name="message" required><?php print @$message; ?></textarea></label></p>
			<p><button type="submit" name="preview">Preview Message</button></p>
		</fieldset>
	</form>
<!-- Stage 2: Send: else -->
	<form id="contact" method="post" action="">
		<fieldset class="preview">
			<legend>Preview Message</legend>
			<p style="display: none"><label><input type="checkbox" name="honeypot"> I am a spambot</label></p>
			<p><label>Name<br><input type="text" name="name" value="<?php print @$name; ?>" readonly></label></p>
			<p><label>Email<br><input type="email" name="email" value="<?php print @$email; ?>" readonly></label></p>
			<p><label>Subject<br><input type="text" name="subject" value="<?php print @$subject; ?>" readonly></label></p>
			<p><label>Message<br><textarea name="message" readonly><?php print @$message; ?></textarea></label></p>
			<p><button type="submit" name="send">Send Message</button><button type="submit" name="review">Edit Message</button></p>
		</fieldset>
	</form>
<!-- End if -->
