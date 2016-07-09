  <?php #insert_contact.php
	$page_title = 'DGHOSH - Admin Insert Contact Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
  ?>
  <?php
  echo '<h2>Insert Contact Data</h2>';
  $link = mysqli("localhost", "root", "", "dgportfolio");
  extract ($_REQUEST);
  if (isset($_POST['submit'])) {
		$sqlc = "INSERT INTO contact (fullName, phone, email, message)".
			   " VALUES ('$fullName','$phone', '$email','$message')";
	    mysql_query( $sqlc ) or die(mysql_error());
	}
  ?>
  <h2>Contact Data</h2>
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" class="finsert">
	Full Name: <INPUT TYPE="text" NAME="fullName"> <br />
	Phone: <INPUT TYPE="text" NAME="phone"> <br />
	Email: <INPUT TYPE="text" NAME="email"> <br />
	Message: <textarea NAME="message" cols="50" rows="5"></textarea> <br />
	<p class="submitbutton">
	<INPUT TYPE="submit" name="submit" value="Add" id="button">
	</p>
  </form> 
  <?php
   mysql_close($link);
   ?>
   <?php
	include ('../includes/footer.html');
  ?>