  <?php #insert_gallery.php
	$page_title = 'DGHOSH - Admin Insert Gallery Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
  ?>
  <?php
  echo '<h2>Insert Gallery Item Data</h2>';
  $link = mysqli("localhost", "root", "", "dgportfolio");
  extract ($_REQUEST);
  if (isset($_POST['submit'])) {
		$sqlg = "INSERT INTO portfolio_items (galID, ititle, idesc, ifileName)".
			   " VALUES ('$galID','$ititle', '$idesc', '$ifileName')";
	    mysql_query( $sqlg ) or die(mysql_error());
	}
  ?>
  <h2>Gallery Item Data</h2>
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" class="finsert">
	Gallery Id: <INPUT TYPE="text" NAME="galID"> <br />
	Item Title: <INPUT TYPE="text" NAME="ititle"> <br />
	Item Description: <INPUT TYPE="text" NAME="idesc"> <br />
	Item File Name: <INPUT TYPE="text" NAME="ifileName"> <br />
	<p class="submitgalbut">
	<INPUT TYPE="submit" name="submit" value="Add" id="button">
	</p>
  </form> 
  <?php
   mysql_close($link);
   ?>
  <?php
	include ('../includes/footer.html');
  ?>