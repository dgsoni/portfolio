  <?php #update_project.php
	$page_title = 'DGHOSH - Admin Update Project Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
  ?>
  <?php
  echo '<h2>Update Project Data</h2></br></br>';
  $link = mysqli("localhost", "root", "", "dgportfolio");
  $sql = "SELECT p.prjID, c.pcatgID, c.pcatg, p.ptitle, p.pdesc, p.pfileName  FROM project_category AS c 
			RIGHT JOIN projects AS p
	        ON c.pcatgID = p.pcatgID 
			ORDER BY p.prjID";
	$recordset = mysql_query( $sql ) or die(mysql_error());
  ?>
  <table  cellpadding="5">
  <tr><th>Project ID</th><th>Project Category ID</th><th>Project Category</th><th>Title</th>
  <th>Description</th><th>File Name</th></tr>
  
  <?php
  $i = 0;
  while( $row=mysql_fetch_assoc($recordset) ) {
	print '<tr><td><a href = "project_edit.php?prjID='.$row["prjID"].'">'.$row["prjID"].
		'</a></td><td>'.$row["pcatgID"].'</td><td>'.$row["pcatg"].'</td><td>'.
		$row["ptitle"].'</td><td>'.$row["pdesc"].'</td><td>'.$row["pfileName"].'</td></tr>';
	$i++;
  }
   mysql_close($link);
   ?>
   </table>
   <?php
	include ('../includes/footer.html');
  ?>