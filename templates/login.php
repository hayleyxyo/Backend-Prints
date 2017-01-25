		<div id="login">
<!-- if not logged in: !isset($_SESSION['user']-->
				<h2>Please Login</h2>
				<?php if(@$error) print "<p class=\"error\">$error</p>"; ?>
				<form method="post" action="">
					<p><label class="adjacent">Email Address<br><input type="text" name="email"></label>
						<label class="adjacent">Password<br><input type="password" name="password"></label>
					</p>
					<p class="clear">
						<label><input type="checkbox" name="remember">Remember me</label></p>
					<p><input type="submit" name="login" value="Login"></p>
				</form>
				<p><a href="/register">Register</a></p>
<!-- else -->
				<h2><?php print "Welcome $_SESSION[givenname] $_SESSION[familyname]"; ?></h2>
				<form method="post" action="">
					<p><button type="submit" name="logout">Logout</button>
						<label><input type="checkbox" name="clearcart">Clear Shopping Cart</label></p>
				</form>
<!-- end if -->
		</div>
