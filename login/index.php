<!DOCTYPE html>
<html>
	<?php

      include '../head.php';
      include '../backend/funcs.php';
      $db_conn = \funcs\Functions::conn();

      if (isset($_POST['login']) && $_POST['username'] !== '' && $_POST['password'] !== '') {
          $sql = "SELECT password FROM `users` WHERE username='".mysqli_real_escape_string($db_conn, $_POST['username'])."'";
          $res = \funcs\Functions::query($db_conn, $sql);
          while ($row = mysqli_fetch_assoc($res)) {
              $hash = $row['password'];
          }
          $verified = password_verify($_POST['password'], $hash);
          if ($verified) {
              header('Location: /admin/');
          } elseif (!$hash) {
              echo 'User Does Not Exist';
          } else {
              echo 'Incorrect Password';
          }
      }
      if (isset($_POST['signup']) && $_POST['username'] !== '' && $_POST['password'] !== '') {
          $new_pass = password_hash($_POST['password'], CRYPT_BLOWFISH);
          $sql = "INSERT INTO `users` (username, password) VALUES ('".mysqli_real_escape_string($db_conn, $_POST['username'])."', '".mysqli_real_escape_string($db_conn, $new_pass)."')";
          $res = \funcs\Functions::query($db_conn, $sql);
          $signedup = ($res) ? true : false;
      }
    ?>
	<style>
	.btn {
		background-image: -webkit-linear-gradient(top, #B7A35A 0%, #A69350 100%);
		background-image: linear-gradient(-180deg, #B7A35A 0%, #A69350 100%);
		box-shadow: 0px 1px 0px 0px #7D6F35;
		border-radius: 2px;
		border: none;
		padding: 6px 20px 4px;
		color: #FFFFFF;
		white-space: nowrap;
		font-size: .8em;
		text-shadow: 0 1px 0 #8D7610;
		margin: 0 !important;
		line-height: 160%;
		width: 100%;
	}
	input {
		position: relative;
		line-height: 20px;
		z-index: 1;
		box-sizing: border-box;
		width: 100%;
		font-size: 14px;
		padding: 5px 60px 5px 8px;
		color: #7c6a59;
		margin: 0 !important;
		border: none;
		box-shadow: 0 1px 0 1px rgba(0, 0, 0, 0.2);
		-webkit-appearance: none !important;
		border-radius: 2px;
	}
	.content {
	  padding-top: 5%;
	}
	label {
	  text-align: left;
	  float: left;
	  font-weight: bold;
	}
	</style>
	<body>
		<?php include '../header.php'; ?>
		<div class="main-content">
			<div class="content">
				<section class="b-issue">
					<h1>Login</h1>

					<form enctype="multipart/form-data" action="" method="post">
						<label for="username">Username:</label> <input type="text" name="username"><br/><br/>
						<label for="password">Password:</label> <input type="password" name="password"><br/><br/>
						<button type="submit" name="login" class="btn">Log In</button>
					</form>
				</section>
				<br/>
				<section class="b-issue">
					<h1>Sign Up</h1>

					<form enctype="multipart/form-data" action="" method="post">
						<label for="username">Username:</label> <input type="text" name="username"><br/><br/>
						<label for="password">Password:</label> <input type="password" name="password"><br/><br/>
						<button type="submit" name="signup" class="btn">Sign Up</button>
					</form>
                    <div class="status">
                        <p><?php echo (isset($signedup)) ? 'Successfully signed up.' : 'Couldn\'t create account.'; ?><p>
                    </div>
				</section>
			</div>
		</div>
		<?php include './footer.php'; ?>
	</body>
</html>
