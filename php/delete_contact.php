  <?php #delete_contact.php
	$page_title = 'DGHOSH - Admin Delete Contact Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
  ?>
  <?php
  echo '<h2>Delete Contact Data</h2>';
  $link = mysqli("localhost", "root", "", "dgportfolio");
  extract ($_REQUEST);
  if (isset($contactID)) {
		$sqld = "DELETE FROM contact WHERE contactID = '$contactID'";
	    mysql_query( $sqld ) or die(mysql_error());
  }
  
  $sql = "SELECT * FROM contact ORDER BY contactID";
  $recordset = mysql_query( $sql ) or die(mysql_error());
  ?>

  <br />
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" id="finsert">
  Select Contact Id to delete:
	<INPUT TYPE="text" NAME="contactID"> 
	<INPUT TYPE="submit" name="submit" value="Delete" id="button">
  </form>
  <br /><br />
  <table cellpadding="5">
  <th>Contact Id</th><th>Full Name</th><th>Phone</th><th>Email</th><th>Message</th>
  
  <?php
  $i = 0;
  while( $row=mysql_fetch_assoc($recordset) ) {
	print '<tr><td>'.$row["contactID"].'</td><td>'.$row["fullName"].'</td><td>'.
		$row["phone"].'</td><td>'.$row["email"].'</td><td>'.$row["message"].'</td></tr>';
	$i++;
  }
   mysql_close($link);
   ?>
   </table>
   <?php
	include ('../includes/footer.html');
  ?>