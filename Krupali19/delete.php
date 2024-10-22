<?php
include("connect.php");
$id=$_GET['id'];
$sql="DELETE FROM  table3 WHERE id='$id'";
$data=mysqli_query($conn,$sql);

if($data)
{
	echo "<script>alert('Record Deleted')</script>";
	header("Location: http://localhost:8080/Krupali19/display.php");
}
else

{
	echo "Failed to Deleted";
}

?>