<?php 

include ("db.php");
$id= $_GET["i"];
$delete=$db->prepare("DELETE FROM todo WHERE id=?");
$result = $delete->execute(array($id));
if ($result) {
	header('Location:./index_2.php');
}
 ?>