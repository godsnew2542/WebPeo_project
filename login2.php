	<html>

	<head>
		<style>
			.text-center {
				text-align: center;
				font-size: 40px;
			}
		</style>
	</head>

	<?php
	require_once('db.php');
	session_start();
	if (isset($_POST['Login'])) {
		if ((empty($_POST['email'])) || (empty($_POST['pass']))) { } else {
			$query = "select * from users where email='" . $_POST['email'] . "' and password='" . $_POST['pass'] . "'";
			$result = mysqli_query($con, $query);
			if (mysqli_fetch_assoc($result)) {
				$_SESSION['User'] = $_POST['email'];
				header("location:infomation.php");
			} else {
				?>
				<div class="text-center">
					<h1>Email/password is incorrect</h1>
					<br>Click here to <a href='login.php'>Login</a>
				</div>
			<?php
		}
	}
} else {
	header("location:login.php");
}
?>

	</html>