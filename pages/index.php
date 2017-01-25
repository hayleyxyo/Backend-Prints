
	<div id="catalogue">
		<h2>Catalogue</h2>
		<form method="post" action="">
		<table>
			<?php print $tbody; ?>
		</table>
		</form>
		<div id="navigation">
			[navigation]
			<br class="clear">
		</div>
	</div>
	<div id="content">
		<div id="login">
			[login]
		</div>
		<hr>
		<!-- if cart: -->
			<div id="index-cart">
				<h2>Shopping Cart</h2>
				<form method="post" action="?page=[page]">
					<table>
						<thead><tr><th>ID</th><th>Image</th><th>Details</th><th>Price</th><th>Qty</th><th>&nbsp;</th></tr></thead>
						<tbody>
							[cart]
						</tbody>
					</table>
				</form>
				<p>Total Price: [totalPrice]</p>
				<form method="post" action="/checkout">
					<button type="submit" name="checkout">Check Out</button>
				</form>
			</div>
		<!-- else: -->
			<h2>Welcome</h2>
			<p>Welcome to the Artworks Formally Known as Prints. This paragraph doesn't say very much of interest,
				but it does fill in some space, and makes the page look a little busier.</p>
			<p>This site is a sample site developed with PHP and MySQL. It illustrates various techniques
				in these technologies, and how they combine to make an interactive data driven site.</p>
			<p>For the record, the images of art used here are from the <a href="http://www.ibiblio.org/wm/">Web Museum</a>.
				It is an excellent collection of art images, made freely available to art lovers such as you and me.
				If you want to to use this artwork yourself, be sure to check out the copyright info at:</p>
			<p><a href="http://www.ibiblio.org/wm/about/license.html">WebMuseum License Agreement</a></p>
		<!-- endif; -->
	</div>
