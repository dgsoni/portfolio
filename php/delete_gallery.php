  <?php #delete_gallery.php
	$page_title = 'DGHOSH - Admin Delete Gallery Data';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
  ?>
  <?php
  echo '<h2>Delete Gallery Data</h2>';
  $link = mysqli("localhost", "root", "", "dgportfolio");
  extract ($_REQUEST);
  if (isset($itemID)) {
		$sqld = "DELETE FROM portfolio_items WHERE itemID = '$itemID'";
	    mysql_query( $sqld ) or die(mysql_error());
  }
  
  $sql = "SELECT * FROM portfolio_items";
  $recordset = mysql_query( $sql ) or die(mysql_error());
  ?>

  <br />
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" id="finsert">
  Select Gallery Item Id to delete:
	<INPUT TYPE="text" NAME="itemID"> 
	<INPUT TYPE="submit" name="submit" value="Delete" id="button">
  </form>
  <br /><br />
  <table cellpadding="5">
  <th>Gallery Item Id</th><th>Gallery Id</th><th>Gallery Item Title</th><th>Gallery Item Description</th><th>File Name</th>
  
  <?php
  $i = 0;
  while( $row=mysql_fetch_assoc($recordset) ) {
	print '<tr><td>'.$row["itemID"].'</td><td>'.$row["galID"].'</td><td>'.
		$row["ititle"].'</td><td>'.$row["idesc"].'</td><td>'.$row["ifileName"].'</td></tr>';
	$i++;
  }
   mysql_close($link);
   ?>
   </table>
   <?php
	include ('../includes/footer.html');
  ?>