<?php
$conf = file_get_contents('./config.json');
$CONFIG = json_decode($conf);
?>
<!DOCTYPE html>
<html>
	<?php
        include './head.php';
        include './backend/funcs.php';
        $db_conn = \funcs\Functions::conn();

        $sql = 'SELECT * FROM `domains`';
        $res = \funcs\Functions::query($db_conn, $sql);
        while ($row = mysqli_fetch_assoc($res)) {
            $urls[$row['url']] = $row['status'];
        }

        $sql = 'SELECT * FROM `messages`';
        $res = \funcs\Functions::query($db_conn, $sql);
        while ($res !== false && $row = mysqli_fetch_assoc($res)) {
            $messages[$row['id']]['message'] = $row['message'];
            $messages[$row['id']]['colour'] = $row['colour'];
        }
    ?>
	<body>
		<?php include './header.php'; ?>
		<?php include './main-content.php'; ?>
		<?php include './footer.php'; ?>
	</body>
</html>
