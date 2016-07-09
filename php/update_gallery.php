  <?php #update_gallery.php
	$page_title = 'DGHOSH - Admin Update Gallery Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
  ?>
  <?php
  echo '<h2>Update Gallery Data</h2></br></br>';
  $link = mysqli("localhost", "root", "", "dgportfolio");
  $sql = "SELECT r.itemID, g.galID, g.gtitle, r.ititle, r.idesc, r.ifileName from gallery AS g 
				RIGHT JOIN portfolio_items AS r
				ON g.galID = r.galID ORDER BY r.itemID";
	$recordset = mysql_query( $sql ) or die(mysql_error());
  ?>
  <table  cellpadding="5">
  <tr><th>Item Id</th><th>Gallery ID</th><th>Gallery Title</th><th>Item Title</th>
  <th>Item Description</th><th>Item File Name</th></tr>
  
  <?php
  $i = 0;
  while( $row=mysql_fetch_assoc($recordset) ) {
	print '<tr><td><a href = "gallery_edit.php?itemID='.$row["itemID"].'">'.$row["itemID"].
		'</a></td><td>'.$row["galID"].'</td><td>'.$row["gtitle"].'</td><td>'.
		$row["ititle"].'</td><td>'.$row["idesc"].'</td><td>'.$row["ifileName"].'</td></tr>';
	$i++;
  }
   mysql_close($link);
   ?>
   </table>
   <?php
	include ('../includes/footer.html');
  ?>