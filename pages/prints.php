	<script type="text/javascript">
		window.onload=function() {
			var form;
			form=document.getElementById('list');
			if(form) {
				form['select'].onchange=function () { this.form.submit(); };
				form['selectprint'].style.visibility='hidden';
			}

			form=document.getElementById('prints-details');
			if(form) {
				form['src'].style.display=form['newsrc'].checked?'block':'none';
				form['newsrc'].onchange=function () { this.form['src'].style.display=this.checked?'block':'none'; };
			}
		};
	</script>
	<form id="list" method="post" action="" id="prints-select">
		<select name="select" onchange="submit();" size="24">
			<option value="0">[New Print]</option>
			<?php print @$list; ?>
		</select>
		<button name="selectprint" type="submit">Select</button>
	</form>
	<form method="post" action="" enctype="multipart/form-data" id="prints-details">
		<input type="hidden" name="id" id="id" value="<?php print @$id; ?>">
		<fieldset>
			<legend>Print Details: <?php print @$id?:''; ?></legend>
				<?php print @$errors; ?>
				<p><label>Print Name<br><input type="text" name="title" value="<?php print @$title; ?>"></label></p>
<?php if(@$id): ?>
	<?php if(@$src): ?>
				<p><img src="images/thumbnails/<?php print $src; ?>" alt="Thumbnail" title="Thumbnail" width="160" height="120"><br>
				<input type="text" name="oldsrc" readonly value="<?php print @$filename; ?>"></p>
				<p><label><input type="checkbox" name="newsrc" value="1"> Replace Image</label></p>
	<?php else: ?>
				<p><label><input type="checkbox" name="newsrc" value="1"> Add Image</label></p>
	<?php endif; ?>
<?php else: ?>
				<p><label><input type="checkbox" name="newsrc" value="1"> Add Image</label></p>
<?php endif; ?>
				<p><input type="file" name="src"></p>
				<p><label>Artist</label>
					<select name="artistid">
						<option value="">Choose One</option>
						<?php print $artistList; ?>
					</select>
				</p>
			<p><label>Price<br><input type="text" name="price" value="<?php print @$price; ?>"></label></p>
			<p><label>Size<br><input type="text" name="size" value="<?php print @$size; ?>"></label></p>
			<p><label>Description<br><textarea name="description"><?php print @$description; ?></textarea></label></p>
		</fieldset>

		<p class="clear">
<?php if(@$id): ?>
			<input type="submit" name="update" value="Change" id="update">
			<input type="submit" name="delete" value="Delete" id="delete">
<?php else: ?>
			<input type="submit" name="insert" value="Add Print">
<?php endif; ?>
		</p>
	</form>
