<?php
include("connect.php");
error_reporting(0);
$id=$_GET['id'];

$sql="SELECT * FROM table3 where id='$id'";
$data=mysqli_query($conn, $sql);
$total=mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
$subject=$result['subject'];
$subject1= explode(",", $subject);
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<style>
	body
 {
	background-image:url("https://wallpapers.com/images/featured/black-wuuaobghtdllhliu.jpg");
    color:white;
	background-size:cover;
 }
    input[type=text],[type=mobile],[type=password],[type=submit]
 { 
	background-color:lightgray;
	padding: 8px 10px;
    margin: 5px 0;
 }
 table
	  {
        border: 2px solid white;
        border-radius: 5px;
       }
</style>
</head>
<body>

<form method="POST" action="">
	<h3>Update Student Datails</h3>
<table border="2">
<tr><td>Enter FirstName :</td>
<td><input type="text" value="<?php echo $result['firstname'];?>" name="firstname" placeholder="Enter FirstName">
</td></tr>

<tr><td>Enter LastName:</td>
<td><input type="text" value="<?php echo $result['lastname'];?>" name="lastname" placeholder="Enter LastName">
</td></tr>

<tr><td>Enter Mobile No.:</td>
<td><input type="mobile" value="<?php echo $result['mobileno'];?>"name="mobileno" placeholder="Enter MobileNo.">
</td></tr>

<tr><td>Enter City:</td>
<td><input type="text" value="<?php echo $result['city'];?>"name="city" placeholder="Enter City">
</td></tr>

<tr><td>
Enter Password:</td>
<td><input type="Password" value="<?php echo $result['password'];?>" name="password" placeholder="Enter Password">
</td></tr>

<tr><td rowspan="2">
Gender:<br>
<input type="radio" name="gender" value="Male" 
<?php 
if($result['gender']== "Male")
{
	echo "checked";
}
?>
>Male
<br>
<input type="radio" name="gender" value="Female" 
<?php 
if($result['gender']== "Female")
{
	echo "checked";
}
?>
>Female
</td>
</tr>
<tr><td colspan="4">
Subject:<br>
<input type="checkbox" name="Sub[]" value="Web Designing"
<?php
if(in_array(" Web Designing", $subject1))
{
	echo "checked";
}
?>
>Web Designing
<br>
<input type="checkbox" name="Sub[]" value="PHP"
<?php
if(in_array("PHP", $subject1))
{
	echo "checked";
}
?>
>PHP
<br>
<input type="checkbox" name="Sub[]" value="Python"
<?php
if(in_array("Python", $subject1))
{ 
	echo "checked";
}
?>
>Python
<br>
<input type="checkbox" name="Sub[]" value="Java"
<?php
if(in_array("Java", $subject1))
{
	echo "checked";
}
?>
>Java
</td></tr>
<tr><td>
<input type="submit" name="submit" value="Update Datails..">
</td></tr>
</form>
</table>
</body>
</html>

<?php
  include 'db.php';
  if(isset($_POST['submit']))
   {
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$mobileno=$_POST['mobileno'];
	$city=$_POST['city'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$sub=$_POST['Sub'];
	$sub1=" ";

	foreach ($sub as $sub2)
	 {
	 	$sub1.=$sub2.",";
	 } 

	$sql="UPDATE table3 set firstname='$firstname',lastname='$lastname',mobileno='$mobileno',city='$city',password='$password',gender='$gender',subject='$sub1' WHERE ID='$id'";
   
    if (mysqli_query($conn,$sql))
	  {
		echo "<script>alert('new record updated')</script>";
		header("Location: http://localhost:8080/Krupali19/display.php");
      }
	 else
	 {
	 	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
    }
?>