<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Landing_page</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond|Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<section class="wrapper">
		<div class="contain">
			<div class="slider" id="slider">
			</div>
		</div>
		<div class="form" id="form_check">
			<div class="formBlock" id="form_1">
				<span class="sign">Game of Thrones</span>
				<form id="form" method="post" action="../resources/php/registration.php">
                        <input type="hidden" name="form" value="form1">
						<label for="email">Enter your email</label>
						<input class="input--border input"
							   type="text"
							   placeholder="arya@westoros.com"
							   id="email"
							   name="email"
							   required>
					<div id="someError1">
                        <?php
                        if(isset($_SESSION['error']) && key($_SESSION['error']) === 'email') {
                            echo '<p class="red">'.$_SESSION['error']['email'].'</p>';
                        }
                        ?>
                    </div>
						<label for="password">Choose secure password</label>
						<span>Must be at least 8 characters</span>
						<input class="input--border input"
							   type="password"
							   placeholder="password"
							   id="password"
							   name="password">
					<div id="someError2">
                        <?php
                        if(isset($_SESSION['error']) && key($_SESSION['error']) === 'password') {
                            echo '<p class="red">'.$_SESSION['error']['password'].'</p>';
                        }
                        ?>
                    </div>
					<div class="box">
							<label class="container">Remember me
							<input type="checkbox"
								   checked="checked"
									name="checkbox">
							<span class="checkmark"></span>
						</label>

					</div>
					<input class="button"
                           type="submit"
                            value="submit"
                           id="form_submit">
				</form>
			</div>
		</div>
	</section>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="js/select.js"></script>
	<script src="js/validation.js"></script>
	<script src="js/slider.js"></script>
</body>
</html>