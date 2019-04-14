<?php
require_once('db.php');
session_start();
if (isset($_POST['Login'])) {
	if ((empty($_POST['email'])) || (empty($_POST['pass']))) {
		?>
		<h3>Email/password is incorrect</h3>
		<br />Click here to <a href='login.php'>Login</a>
	<?php
} else {
	$query = "select * from users where email='" . $_POST['email'] . "' and password='" . $_POST['pass'] . "'";
	$result = mysqli_query($con, $query);

	if (mysqli_fetch_assoc($result)) {
		$_SESSION['User'] = $_POST['email'];
		header("location:infomation.php");
	} else {
		?>
			<h3>Email/password is incorrect</h3>
			<br />Click here to <a href='login.php'>Login</a>
		<?php
	}
}
} else {
	echo 'Not Working Now Guys';
}

?>