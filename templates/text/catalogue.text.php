<tr><th>$row[id]</th>
	<td><a class="light" href="$previewFolder/$row[src]"><img src="$thumbnailFolder/$row[src]" alt="$row[title]" title="$row[title]" width="$thumbnailWidth" height="$thumbnailHeight"></a></td>
	<td>$row[givenname] $row[familyname]<br>
		$row[title]<br>
		Price: $price<br>
		<button name="add[$row[id]]"><img src="ui/picture_add.png" alt="Add" title="Add to Shopping Cart"></button>
	</td>
</tr>
