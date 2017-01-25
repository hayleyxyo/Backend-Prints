	<script type="text/javascript">
		window.onload=function() {
			// Auto Submit and Hide submit button if JavaScript available
			var form;
			if(form=document.getElementById('list')) {
				form['artists'].onchange=function () { form.submit(); };
				form['selectartist'].style.visibility='hidden';
			}
		};
	</script>
		<form id="list" method="post" action="">
		<div>
		<select name="select" id="artists" onchange="submit();" size="12">
			<option value="0">[New Artist]</option>
			[list]
		</select>
		<button name="selectartist" type="submit">Select</button>
		</div>
	</form>
	<form id="details" method="post" action="">
		[errors]
		<input type="hidden" name="id" id="id" value="<?php print @$id; ?>">
		<fieldset>
			<legend>Artist Details: [id?:'']</legend>
			<p><label class="adjacent">First Name<br><input type="text" name="givenname" value="<?php print @$givenname; ?>"></label>
				<label class="adjacent">Last Name<br><input type="text" name="familyname" value="<?php print @$familyname; ?>"></label>
				<label class="adjacent">Known As<br><input type="text" name="aka" value="<?php print @$aka; ?>"></label>
			</p>
		<p class="clear">
<!-- if id: -->
			<button type="submit" name="insert">Add</button>
<!-- else: -->
			<button type="submit" name="update">Change</button>
			<button type="submit" name="delete">Delete</button>
<!-- endif; -->

		</p>
		</fieldset>
	</form>
