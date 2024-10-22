<?php
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<title> Registration</title>
<style>
	body
	{
		background-image:url("https://wallpapers.com/images/featured/black-wuuaobghtdllhliu.jpg");
		color:white;
		background-size:cover;
		
	}
	
	input[type=text],[type=mobile],[type=password]
	{ 
		background-color:lightgray;
		padding:10px;
		margin: 5px;
		color: black;
		border: none;
		width: 380px;
		margin-left: 5%;
		font-weight: bold;
		border-radius: 5px;
	}
	
	input[type=submit]{
        width: 50%;
		padding:10px;
		margin: 2px;
		margin-left: 25%;
		background-color: white;
		border-radius: 5px;
		font-size: 15px;
		font-weight: bold;
		border: none;
		margin-bottom: 5px;
	} 
	form
	{
	  border:5px solid white;
	  margin-left: 35%;
	 /* border-color: aliceblue; */
     width: 450px;
	 /* opacity: 0.9; */
	}
	
	label{
		font-size: 18px;
		margin-left: 5%;
		margin-top: -2%;
	}
	h2{
		align-items: center;
		text-align: center;
	}
	.gender{
		float: left;
		margin-left:16px;

	}
	.checkbox{
		margin-left: 40%;
	}
	.radio{
		margin-top: 10px;
	}
	</style>
</head>
<body>

<form method="POST" action="">
<h2>Insert Data</h2>
<label>Enter First Name :</label>	
<br>
<input type="text" name="firstname" placeholder="Enter First Name...." required>
<br>
<label>Enter Last Name:</label>	
<br>
<input type="text" name="lastname" placeholder="Enter Last Name...." required>
<br>
<label>Enter Mobile No.:</label>
<br>
<input type="mobile" name="mobileno" placeholder="Enter MobileNo...."required>
<br>
<label>Enter City:</label>
<br>
<input type="text" name="city" placeholder="Enter City...." required>

<br>
<label>Enter Password:</label>
<br>
<input type="password" name="password" placeholder="Enter Password...." required>
<br>

<div class="radio">
<div class="gender">
<label>Gender:</label><br>
<input type="radio" name="gender" value="Male">Male
<br>
<input type="radio" name="gender" value="Female">Female

</div>	
<div class="checkbox">
<label>Subject:<br></label>
<input type="checkbox" name="Sub[]" value="Web Designing">Web Designing

<input type="checkbox" name="Sub[]" value="PHP">PHP
<br>
<input type="checkbox" name="Sub[]" value="Python">Python
<input type="checkbox" name="Sub[]" value="Java">Java
</div>
</div>	
<br>
<input type="submit" name="submit" value="Insert">
	
</form>
	

</body>
</html>

<?php
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
	
	$sql="INSERT INTO table3(firstname,lastname,mobileno,city,password,gender,subject)
	VALUES('$firstname','$lastname','$mobileno','$city','$password','$gender','$sub1')";
   
   if(mysqli_query($conn,$sql))
	{
		echo "<script>alert('new record inserted')</script>";
		header("Location: http://localhost:8080/Krupali19/display.php");
	}
	
	 else
	 {
	 	 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>