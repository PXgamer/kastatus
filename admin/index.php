<!DOCTYPE html>
<html>
	<?php
				session_start();

				if (!isset($_SESSION['user']) || !$_SESSION['user']) {
					header('Location: /login/');
				}

        include '../head.php';
        include '../backend/funcs.php';
        $db_conn = \funcs\Functions::conn();
        $errors = '';
    ?>
	<body>
		<style>

		a:active, a:hover, a:visited {
			color:#594C2D;
		}

		.btn{
			background-image: -webkit-linear-gradient(top, #B7A35A 0%, #A69350 100%);
			background-image: linear-gradient(-180deg, #B7A35A 0%, #A69350 100%);
			box-shadow: 0px 1px 0px 0px #7D6F35;
			border-radius: 2px;
			border: none;
			padding: 6px 20px 4px;
			color: #FFFFFF !important;
			white-space: nowrap;
			font-size: .8em;
			text-shadow: 0 1px 0 #8D7610;
			margin: 0 !important;
			line-height: 160%;
		}

		.btn2 {
			background-image: -webkit-linear-gradient(top, #B7A35A 0%, #A69350 100%);
			background-image: linear-gradient(-180deg, #B7A35A 0%, #A69350 100%);
			box-shadow: 0px 1px 0px 0px #7D6F35;
			border-radius: 2px;
			border: none;
			padding: 6px 20px 4px;
			color: #FFFFFF !important;
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
		<div class="main-content">
		<?php
        if (isset($_GET['mode']) && $_GET['mode'] == 'add_domain') {
            $sql = 'SELECT * FROM `domains`';
            $res = \funcs\Functions::query($db_conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $urls[$row['id']] = $row['url'];
            }

            if (isset($_POST['add_domain']) && isset($_POST['domain']) && $_POST['domain'] !== '') {
                $sql = "INSERT INTO `domains` (url, status) VALUES ('".mysqli_real_escape_string($db_conn, $_POST['domain'])."', '200')";
                $res = \funcs\Functions::query($db_conn, $sql);
                if ($res) {
                    $errors = '<p style="color: green;">Domain added successfully.</p><i class="b-issue-status-icon icon-checkmark-circle-green"></i>';
                } else {
                    $errors = "<p style=\"color: red;\">Domain couldn't be added.</p><i class=\"b-issue-status-icon icon-cross-circle\"></i>";
                }
            } ?>
			<div class="content">
				<section class="b-issue">
					<h1>Add Domain</h1>

					<form enctype="multipart/form-data" action="" method="post">
						<label for="domain">Domain URL:</label> <input type="url" name="domain" autocomplete="off"><br/><br/>
						<button type="submit" name="add_domain" class="btn2">Add Domain</button>
					</form>
					<div class="">
						<?php echo $errors; ?>
					</div>
				</section>
				<br/>
				<section class="b-issue">
					<table class="table">
						<tr><th>ID</th><th>Domain</th><th>Actions</th></tr>
						<?php
                        foreach ($urls as $id => $url) {
                            echo "<tr><td>$id</td><td>$url</td><td></td>";
                        } ?>
					</table>
				</section>
			</div>
	<?php

        } elseif (isset($_GET['mode']) && $_GET['mode'] == 'add_message') {
            $sql = 'SELECT * FROM `messages`';
            $res = \funcs\Functions::query($db_conn, $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $messages[$row['id']]['message'] = $row['message'];
                $messages[$row['id']]['colour'] = $row['colour'];
            }

            if (isset($_POST['add_message']) && isset($_POST['message']) && $_POST['message'] !== '') {
                $sql = "INSERT INTO `messages` (message, colour) VALUES ('".mysqli_real_escape_string($db_conn, $_POST['message'])."', '".mysqli_real_escape_string($db_conn, $_POST['colour'])."')";
                $res = \funcs\Functions::query($db_conn, $sql);
                if ($res) {
                    $errors = '<p style="color: green;">Message added successfully.</p><i class="b-issue-status-icon icon-checkmark-circle-green"></i>';
                } else {
                    $errors = "<p style=\"color: red;\">Message couldn't be added.</p><i class=\"b-issue-status-icon icon-cross-circle\"></i>";
                }
            } ?>
			<div class="content">
				<section class="b-issue">
					<h1>Add Message</h1>

					<form enctype="multipart/form-data" action="" method="post">
						<label for="message">Message Content:</label> <textarea name="message" rows="10" autocomplete="off" style="width: 100%;"></textarea><br/>
						<label for="message">Message Colour:</label>
						<select name="colour" style="width: 100%; border-radius: 2px;">
								<option value="red">Red</option>
								<option value="orange">Orange</option>
								<option value="green">Green</option>
						</select>
						<br/><br/>
						<button type="submit" name="add_message" class="btn2">Add Message</button>
					</form>
					<div class="">
						<?php echo $errors; ?>
					</div>
				</section>
				<br/>
				<section class="b-issue">
					<table class="table">
						<tr><th>ID</th><th>Content</th><th>Colour</th><th>Actions</th></tr>
						<?php
                        foreach ($messages as $id => $content) {
                            echo "<tr><td>$id</td><td>".$content['message'].'</td><td style="color:'.$content['colour'].';">'.$content['colour'].'</td><td></td>';
                        } ?>
					</table>
				</section>
			</div>
	<?php

        } else {
            ?>
	<center>
		<div class="content">
			<section class="b-issue">
				<h1>No Option Chosen</h1>
				<br/>
				<ul style="list-style: none; margin: 0 auto; padding: 0; text-align: left;">
					<li style="margin: 0; color: black; text-align: center;">Options</li>
					<br />
					<li style="margin: 0; color: black; text-align: center;"> <a href="?mode=add_domain">Add Domains</a></li>
					<br />
					<li style="margin: 0; color: black; text-align: center;"> <a href="?mode=add_domain">Edit Domains</a></li>
					<br />
					<li style="margin: 0; color: black; text-align: center;"> <a href="?mode=add_message">Add Messages</a></li>
					<br />
					<li style="margin: 0; color: black; text-align: center;"> <a href="?mode=add_message">Edit Messages</a></li>
				</ul>
			</section>
			<br />
			<a href="/" class="btn"> LOGOUT </a>
			<?php session_destroy() ?>
		</div>
	</center>
	<?php

        }
    ?>
		</div>
	</body>
</html>
