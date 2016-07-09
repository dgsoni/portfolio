  <?php #admin_select.php
	$page_title = 'DGHOSH - Admin Select Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
  ?>
  <h2>Select Data</h2>
  <?php
	$link = mysqli("localhost", "root", "", "dgportfolio");
  ?>
  <section>
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
  <p><label for="tblname">Choose Table Name: </label>
 	<input type="radio" name="tblname" id="gallery" value="gallery" <?php if 
	(isset($_POST['tblname']) && ($_POST['tblname'] == 'gallery')) echo 'checked = "checked"'; ?> /> Gallery   
 	<input type="radio" name="tblname" id="project" value="project" <?php if 
	(isset($_POST['tblname']) && ($_POST['tblname'] == 'project')) echo 'checked = "checked"'; ?> /> Projects
 	<input type="radio" name="tblname" id="contact" value="contact" <?php if 
	(isset($_POST['tblname']) && ($_POST['tblname'] == 'contact')) echo 'checked = "checked"'; ?>/> Contact
    <input type="submit" name="submit" value="Submit" id="button" />
  </p>
  </form>
  <?php
  $gal_status = 'unchecked';
  $prj_status = 'unchecked';
  $con_status = 'unchecked';
  if (isset($_POST['submit'])) {
	  $sel_radio = $_POST['tblname'];
	  if ($sel_radio == 'gallery') { 
		  $gal_status = 'checked';
	  } elseif ($sel_radio == 'project') {
		  $prj_status = 'checked';
	  } else { $con_status = 'checked';  
	  }
  }
  if ($con_status == 'checked') {
  $sql = "SELECT * FROM contact ORDER BY contactID LIMIT 10";
  $recordset = mysql_query($sql) or die(mysql_error());
   ?>
  <h2>Contact List</h2>
  <table cellpadding="5">
  <tr><th>Contact Id</th><th>Full Name</th><th>Phone</th>
  <th>Email</th><th>Message</th></tr>
  <?php
  $i = 0;
  while ($row = mysql_fetch_assoc($recordset)) {
	  print '<tr><td>'.$row["contactID"].'</td><td>'.$row["fullName"].'</td>';
	  print '<td>'.$row["phone"].'</td><td>'.$row["email"].'</td>';
	  print '<td>'.$row["message"].'</td></tr>';
	  $i++;
  }
  }
  ?>
  </table>
  <?php
  if ($prj_status == 'checked') {
	$sql = "SELECT c.pcatgID, c.pcatg, p.* FROM project_category AS c 
			LEFT JOIN projects AS p
	        ON c.pcatgID = p.pcatgID ORDER BY c.pcatgID LIMIT 10";
	$recordset = mysql_query( $sql ) or die(mysql_error());
  echo '<h2>Project List</h2>';
  echo '<table cellpadding="5">';
  echo '<tr><th>Project Category Id</th><th>Project Category</th><th>Project ID</th><th>Title</th>';
  echo '<th>Description</th><th>File Name</th></tr>';
  $i = 0;
  while ($row = mysql_fetch_assoc($recordset)) {
	  print '<tr><td>'.$row["pcatgID"].'</td><td>'.$row["pcatg"].'</td><td>'.$row["prjID"].'</td>';
	  print '<td>'.$row["ptitle"].'</td><td>'.$row["pdesc"].'</td>';
	  print '<td>'.$row["pfileName"].'</td></tr>';
	  $i++;
  }
  echo '</table>';
  }
  ?>
  <?php
  if ($gal_status == 'checked') {
	  $sql = "SELECT g.galID, g.gtitle, r.itemID, r.ititle, r.idesc, r.ifileName from gallery AS g 
				LEFT JOIN portfolio_items AS r
				ON g.galID = r.galID ORDER BY g.galID LIMIT 10";
	  $recordset = mysql_query( $sql ) or die(mysql_error());
	echo '<h2>Gallery List</h2>';
	echo '<table cellpadding="5">';
	echo '<tr><th>Gallery Id</th><th>Gallery Title</th><th>Item Id</th><th>Item Title</th>';
	echo '<th>Item Description</th><th>Item File Name</th></tr>';
	$k = 0;
	while ($row = mysql_fetch_assoc($recordset)) {
		print '<tr><td>'.$row["galID"].'</td><td>'.$row["gtitle"].'</td>';
		print '<td>'.$row["itemID"].'</td><td>'.$row["ititle"].'</td>';
		print '<td>'.$row["idesc"].'</td><td>'.$row["ifileName"].'</td></tr>';
		$k++;
	}
	echo '</table>';
  }
  ?>
  <?php
   mysql_close($link);
   ?>
    </section>
  <?php
	include ('../includes/footer.html');
  ?>