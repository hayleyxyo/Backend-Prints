	<script type="text/javascript">
		window.onload=function() {
			var form;
			form=document.getElementById('list');
			if(form) {
				form['select'].onchange=function () { form.submit(); };
				form['selectprint'].style.visibility='hidden';
			}
		};
	</script>
	<form id="list" method="post" action="" id="prints-select">
		<select name="select" onchange="submit();" size="24">
			<option value="0">[New Print]</option>
<!-- prints list: $list; -->
		</select>
		<button name="selectprint" type="submit">Select</button>
	</form>
	<form method="post" action="" enctype="multipart/form-data" id="prints-details">
		<input type="hidden" name="id" id="id" value="[id]">
		<fieldset>
			<legend>Print Details: [id]</legend>
<!-- errors: $errors -->
				<p><label>Print Name<br><input type="text" name="title" value="[title]"></label></p>
<!-- if existing: $id -->
				<p><img src="[…/src]" alt="Thumbnail" title="Thumbnail" width="160" height="120"><br>
				<input type="text" name="oldsrc" readonly value="[src]"></p>
				<p><label><input type="checkbox" name="newsrc" value="1"> Replace Image</label></p>
<!-- end if -->
				<p><input type="file" name="src"></p>
				<p><label>Artist</label>
					<select name="artistid">
						<option value="">Choose One</option>
<!-- artist id: $artists -->
					</select>
				</p>
			<p><label>Price<br><input type="text" name="price" value="[price]"></label></p>
			<p><label>Size<br><input type="text" name="size" value="[size]"></label></p>
			<p><label>Description<br><textarea name="description">[description]</textarea></label></p>
		</fieldset>



		<p class="clear">
<!-- if existing: $id -->
			<input type="submit" name="update" value="Change" id="update">
			<input type="submit" name="delete" value="Delete" id="delete">
<!-- else -->
			<input type="submit" name="insert" value="Add Print">
<!-- end if -->
		</p>
	</form>

