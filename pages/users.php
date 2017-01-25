	<form id="list" method="post" action="">
		<select name="select" id="qartists" onchange="submit();" size="12">
			<option value="0">[New User]</option>
<!-- user list: $list; -->
		</select>
	</form>
	<form id="details" method="post" action="">
<!-- errors: $errors -->
		<input type="hidden" name="id" value="[id]">
		<fieldset>
			<legend>User Details: [id]</legend>
			<div class="adjacent">
			<p><label>First Name<br><input type="text" name="givenname" value="[givenname]"></label>
				<label>Last Name<br><input type="text" name="familyname" value="[familyname]"></label>
				<label>Email<br><input type="text" name="email" value="[email]"></label>
			</p>
			</div>
			<p class="clear"><label><input type="checkbox" name="keeppassword" value="1" checked> Keep Password</label><br>
				<label class="adjacent">Password<br><input type="password" name="password"></label>
				<label class="adjacent">Confirm Password<br><input type="password" name="confirm"></label>
			</p>
			<p><label><input type="checkbox" name="admin" value="1"> Administrator</label></p>
			<p><label><input type="checkbox" name="contributor" value="1"> Contributor</label></p>
			<p class="clear">
<!-- if existing: $id -->
				<input type="submit" name="insert" value="Add"    id="insert">
<!-- else -->
				<input type="submit" name="update" value="Change" id="update">
				<input type="submit" name="delete" value="Delete" id="delete">
<!-- end if -->
			</p>
		</fieldset>
	</form>

