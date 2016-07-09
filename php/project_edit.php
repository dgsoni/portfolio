<?php #project_edit.php
	$page_title = 'DGHOSH - Admin Project Update Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
extract($_REQUEST);
$link = mysqli("localhost", "root", "", "dgportfolio");
$status="";

if( isset($submit) ) {
	$status = "";

	if( $ptitle == "" ) {
		$status = "Please enter the Project Title.<br>";
	} else {
		
		$sql = "UPDATE projects 
				 SET ptitle='$ptitle', " .
				 "pdesc='$pdesc', " .
				 "pfileName='$pfileName'" .
				 "WHERE prjID = '$prjID'";


		mysql_query( $sql )	or die(mysql_error());

		$status = "SUCCESSFULLY updated the project info";
	}
} else {

	$sql = "SELECT * from projects WHERE prjID = '$prjID'";
	$resultset = mysql_query( $sql ) or die(mysql_error());
	$row = mysql_fetch_assoc( $resultset );
	extract( $row );
}
?>


<h2>Projects Update Screen</h2>
<p>&nbsp;</p>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<input type="hidden" name="prjID" value="<?=$prjID?>">
<table>
  <? if (isset($status)) {?>
  	<tr><td colspan="2"><b><?=$status?></b><br><br></td></tr>
  <? } ?>
  <tr><td>Project Title </td><td><input type="text" name="ptitle" value="<?=$ptitle ?>" /></td></tr>
  <tr><td>Project Description </td><td><input type="text" name="pdesc" value="<?=$pdesc ?>" /></td></tr>
  <tr><td>Project File Name </td><td><input type="text" name="pfileName" value="<?=$pfileName ?>" /></td></tr>
  </table>
  <p class="subupdate">
  <input type="submit" name="submit" value="Update" id="button"/>
  </p>
</form>
<?php 
 mysql_close($link);
 include ('../includes/footer.html');
?>
