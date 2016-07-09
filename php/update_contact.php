  <?php #update_contact.php
	$page_title = 'DGHOSH - Admin Update Contact Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
  ?>
  <?php
  echo '<h2>Update Contact Data</h2></br></br>';
  $link = mysqli("localhost", "root", "", "dgportfolio");
  $sql = "SELECT * FROM contact";
  $recordset = mysql_query( $sql ) or die(mysql_error());
  ?>
  <table  cellpadding="5">
  <th>Contact ID</th><th>Full Name</th><th>Phone</th><th>Email Address</th><th>Message</th>

  <?php
  $i = 0;
  while( $row=mysql_fetch_assoc($recordset) ) {
	print '<tr><td><a href = "contact_edit.php?contactID='.$row["contactID"].'">'.$row["contactID"].
		'</a></td><td>'.$row["fullName"].'</td><td>'.$row["phone"].'</td><td>'.
		$row["email"].'</td><td>'.$row["message"].'</td></tr>';
	$i++;
  }
   mysql_close($link);
   ?>
   </table>
   <?php
	include ('../includes/footer.html');
  ?>