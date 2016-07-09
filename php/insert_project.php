  <?php #insert_project.php
	$page_title = 'DGHOSH - Admin Insert Project Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
  ?>
  <?php
  echo '<h2>Insert Project Data</h2>';
  $link = mysqli("localhost", "root", "", "dgportfolio");
  extract ($_REQUEST);
  if (isset($_POST['submit'])) {
		$sqlp = "INSERT INTO projects (pcatgID, ptitle, pdesc, pfileName)".
			   " VALUES ('$pcatgID','$ptitle', '$pdesc', '$pfileName')";
	    mysql_query( $sqlp ) or die(mysql_error());
	}
  ?>
  <h2>Project Data</h2>
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" class="finsert">
	Project Category Id: <INPUT TYPE="text" NAME="pcatgID"> <br />
	Project Title: <INPUT TYPE="text" NAME="ptitle"> <br />
	Project Description: <INPUT TYPE="text" NAME="pdesc"> <br />
	Project File Name: <INPUT TYPE="text" NAME="pfileName"> <br />
	<p class="submitprjbut">
	<INPUT TYPE="submit" name="submit" value="Add" id="button">
	</p>
  </form> 
  <?php
   mysql_close($link);
   ?>
  <?php
	include ('../includes/footer.html');
  ?>