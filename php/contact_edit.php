<?php #contact_edit.php
	$page_title = 'DGHOSH - Admin Contact Update Page';
	include ('../includes/header.html');
	include ('../library/dglibrary.php');
extract($_REQUEST);
$link = mysqli("localhost", "root", "", "dgportfolio");
$status="";

if( isset($submit) ) {
	$status = "";

	if( $fullName == "" ) {
		$status = "Please enter the Full Name.<br>";
	} else {
		
		$sql = "UPDATE contact SET fullName='$fullName', " .
				"phone='$phone', " .
				"email='$email', " .
				"message='$message'" .
				"WHERE contactID = '$contactID'";


		mysql_query( $sql )	or die(mysql_error());

		$status = "SUCCESSFULLY updated the contact info";
	}
} else {

	$sql = "SELECT * from contact WHERE contactID = '$contactID'";
	$resultset = mysql_query( $sql ) or die(mysql_error());
	$row = mysql_fetch_assoc( $resultset );
	extract( $row );
}
?>


<h2>Contact Update Screen</h2>
<p>&nbsp;</p>
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<input type="hidden" name="contactID" value="<?=$contactID?>">
<table>
  <? if (isset($status)) {?>
  	<tr><td colspan="2"><b><?=$status?></b><br><br></td></tr>
  <? } ?>
  <tr><td>Full Name </td><td><input type="text" name="fullName" value="<?=$fullName ?>" /></td></tr>
  <tr><td>Phone </td><td><input type="text" name="phone" value="<?=$phone ?>" /></td></tr>
  <tr><td>Email Address </td><td><input type="text" name="email" value="<?=$email ?>" /></td></tr>
  <tr><td>Message </td><td><input type="text" name="message" value="<?=$message ?>" /></td></tr>
  </table>
  <p class="subupdate">
	<input type="submit" name="submit" value="Update" id="button"/>
  </p>
</form>
<?php 
 mysql_close($link);
 include ('../includes/footer.html');
?>
