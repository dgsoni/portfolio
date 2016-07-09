  <html>
  <body bgcolor="#F3F476" align="center">
  <font face="arial">
  <p>&nbsp;</p>
  <h1 style="color:green">Contact Page</h1>
  <?php #email.php
	include ('../library/dglibrary.php');
	$link = mysqli("localhost", "root", "", "dgportfolio");
	extract ($_REQUEST);
  ?>
	Welcome <?php echo $_POST["fullName"]; ?><br><br>
	Your phone is: <?php echo $_POST["phone"]; ?><br><br>
	Your email address is: <?php echo $_POST["email"]; ?><br><br>
	Your message is: <?php echo $_POST["message"]; ?><br><br>
  <?php
		$sqlc = "INSERT INTO contact (fullName, phone, email, message)".
			   " VALUES ('$fullName','$phone', '$email','$message')";
	    mysql_query( $sqlc ) or die(mysql_error());
		mysql_close($link);
	echo "Your contact info was inserted successfully";
  ?>
  <p>You can view <a href="../html/index.html" style="color:red">Home Page</a></p>
  <?php
  $to = "dghosh@brookdalecc.edu";
  $body = "Name: {$_POST['fullName']}\n\nMessage: {$_POST['message']}";
  $subject = "Contact Form Submission";
  $headers = "From: {$_POST['email']}\r\n";
  //Send email
  mail($to, $subject, $body, $headers);
  //$_POST = array();
  ?>
  </body>
  </html>
   