	<div id="cart">
<!-- if not logged in (!$user), quire_once 'templates/login.php' -->
	<!-- if editing:  !$ordered)-->
				<form method="post" action=""><h2>Shopping Cart: <?php print "$givenname $familyname"; ?></h2>
					<table><?php print $cartitems; ?></table>
					<p>Total Cost: <?php print $totalPrice;?></p>
					<button type="submit" name="edit">Update Cart</button>
					<button type="submit" name="order">Place Order</button>
				</form>
	<!-- else -->
				<p>Thank you for your order.<br>You will receive a confirmation in your email.</p>
	<!-- end if -->
<!--end if -->
		<p><a href="index.php">Back to Catalogue</a></p>
	</div>
