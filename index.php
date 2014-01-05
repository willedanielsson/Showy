	<?php include ("header.php"); ?>

		<nav>
			<a onclick=showLogin() class="start_button"> 
				<div class="login_sign" id="login">
					<p>Login</p>
				</div>
			</a>

			<a onclick=showSign() class="start_button">
				<div class="login_sign" id="sign_up">
					<p>Sign Up</p>
				</div>
			</a>
		</nav>
		
	
		<div class="member_nav">
		
			<div class="wrapper" id="login_wrapper">
				<form name="login" class="form" action="checklogin.php" method="post">
					<div class="form_content">
						<input name="user_username" type="text" class="input" placeholder="Username" />

						<input name="user_password" type="password" class="input" id="not_first_input" placeholder="Password" />
						
						<input type="submit" name="submit" value="Login" class="button" />

					</div>

						 <?php if( isset($_GET['login_failed']) && $_GET['login_failed'] == TRUE): ?>
							<p id="login_text">Wrong username/password </p>
						<?php endif; ?>
				</form>
			</div>
				
			<div class="wrapper" id="sign_up_wrapper">
				<form name="sign_up" class="form" action="register.php" method="post">
					<div class="form_content">
						<input name="user_email" type="email" class="input" placeholder="Email" />

						<input name="user_username" type="text" class="input" placeholder="Username" />

						<input name="user_password" type="password" class="input" placeholder="Password" />

						<input type="submit" name="submit" value="Register" class="button" />
					</div>

				</form>
			</div>
					 
		</div>
		
	<div class="content">	
		<div id="slideshow">
			<ul class="bxslider">
			  <li><img src="/images/pic1.jpg" title="Nummer1" /></li>
			  <li><img src="/images/pic2.jpg" title="Nummer2"/></li>
			  <li><img src="/images/pic3.jpg" title="Nummer3"/></li>
			</ul>
		</div>
	</div>

	<script>
		$(document).ready(function(){
		  $('.bxslider').bxSlider();
		});

		$('.bxslider').bxSlider({
		  	auto: true,
		  	autoHover: true,
		  	mode: 'fade'
		});
	</script>

</body>
</html>