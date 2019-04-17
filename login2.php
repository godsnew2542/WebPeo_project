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
		if ((empty($_POST['email'])) || (empty($_POST['pass']))) {
			?>
			<div class="text-center">
				<h1>Email/password is incorrect</h1>
				<br>Click here to <a href='login.php'>Login</a>
			</div>
		<?php
	} else {
		$query = "select * from user where Email = '" . $_POST['email'] . "' and Passwd = '" . $_POST['pass'] . "'";
		$result = mysqli_query($con, $query);

		if ($record = mysqli_fetch_array($result, MYSQLI_BOTH)) {
			$_SESSION['User'] = $record['Uname'];
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