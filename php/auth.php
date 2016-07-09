<html><head><title>Authorization Page</title></head>
<body bgcolor="#F3F476" align="center">
<font face="arial">
<p>&nbsp;</p>
<h1 style="color:orange">Authorization Page</h1>
<?php
	session_start();
	if (isset($_POST['login'])){
		if (isset($_POST['username']) && ($_POST['username'] == "admin") &&
			isset($_POST['password']) && ($_POST['password'] == "admin")) {
				$_SESSION['Authenticated'] = 1;
		}
		else {
				$_SESSION['Authenticated'] = 0;
		}
		session_write_close();
		if (isset($_SESSION['Authenticated']) && ($_SESSION['Authenticated'] == 1)) {
?>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<h2>You are logged in</h2>
			<p>You can view <a href="admin_select.php" style="color:red">Administration Page</a></p>
			<p>or You can <a href="auth.php?logout" style="color:blue">log out</a></p>
<?php
		}
		else {
?>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<h2>You are not logged in</h2>
		<p>You can <a href="../html/login.html" style="color:blue">log in</a></p>
<?php
		}
	}
	if (isset($_GET['logout'])){
		$_SESSION = array();
		session_destroy();
		setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0);
		echo "<h1>Logged out</h1>";
		header("Location: ../html/login.html");
	}
?>
</font>
</body>
</html>