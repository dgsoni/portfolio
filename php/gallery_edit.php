<?php #gallery_edit.php
	$page_title = 'DGHOSH - Admin Gallery Items Update Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
extract($_REQUEST);
$link = mysqli("localhost", "root", "", "dgportfolio");
$status="";

if( isset($submit) ) {
	$status = "";

	if( $ititle == "" ) {
		$status = "Please enter the Item Title.<br>";
	} else {
		
		$sql = "UPDATE portfolio_items 
				 SET ititle='$ititle', " .
				 "idesc='$idesc', " .
				 "ifileName='$ifileName'" .
				 "WHERE itemID = '$itemID'";


		mysql_query( $sql )	or die(mysql_error());

		$status = "SUCCESSFULLY updated the gallery items info";
	}
} else {

	$sql = "SELECT * from portfolio_items WHERE itemID = '$itemID'";
	$resultset = mysql_query( $sql ) or die(mysql_error());
	$row = mysql_fetch_assoc( $resultset );
	extract( $row );
}
?>


<h2>Gallery Items Update Screen</h2>
<p>&nbsp;</p>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<input type="hidden" name="itemID" value="<?=$itemID?>">
<table>
  <? if (isset($status)) {?>
  	<tr><td colspan="2"><b><?=$status?></b><br><br></td></tr>
  <? } ?>
  <tr><td>Item Title </td><td><input type="text" name="ititle" value="<?=$ititle ?>" /></td></tr>
  <tr><td>Item Description </td><td><input type="text" name="idesc" value="<?=$idesc ?>" /></td></tr>
  <tr><td>Item File Name </td><td><input type="text" name="ifileName" value="<?=$ifileName ?>" /></td></tr>
  </table>
  <p class="subupdate">
  <input type="submit" name="submit" value="Update" id="button"/>
  </p>

</form>
<?php 
 mysql_close($link);
 include ('../includes/footer.html');
?>
