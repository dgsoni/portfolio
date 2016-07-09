  <?php #delete_project.php
	$page_title = 'DGHOSH - Admin Delete Project';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
  ?>
  <?php
  echo '<h2>Delete Project Data</h2>';
  $link = mysqli("localhost", "root", "", "dgportfolio");
  extract ($_REQUEST);
  if (isset($prjID)) {
		$sqld = "DELETE FROM projects WHERE prjID = '$prjID'";
	    mysql_query( $sqld ) or die(mysql_error());
  }
  
  $sql = "SELECT * FROM projects";
  $recordset = mysql_query( $sql ) or die(mysql_error());
  ?>

  <br />
  <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" id="finsert">
  Select Project Id to delete:
	<INPUT TYPE="text" NAME="prjID"> 
	<INPUT TYPE="submit" name="submit" value="Delete" id="button">
  </form>
  <br /><br />
  <table cellpadding="5">
  <th>Project Id</th><th>Project Category Id</th><th>Project Title</th><th>Project Description</th><th>File Name</th>
  
  <?php
  $i = 0;
  while( $row=mysql_fetch_assoc($recordset) ) {
	print '<tr><td>'.$row["prjID"].'</td><td>'.$row["pcatgID"].'</td><td>'.
		$row["ptitle"].'</td><td>'.$row["pdesc"].'</td><td>'.$row["pfileName"].'</td></tr>';
	$i++;
  }
   mysql_close($link);
   ?>
   </table>
   <?php
	include ('../includes/footer.html');
  ?>