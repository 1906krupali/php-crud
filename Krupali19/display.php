<!DOCTYPE html>
<html>
<head>
<style>
	body
	{
		background-image:url("https://wallpapers.com/images/featured/black-wuuaobghtdllhliu.jpg");
		color:white;
		background-size:cover;
	}
	a
      {
	   color: white;
	   text-decoration: none;
      }
	a:hover
      {
	   color:bisque;
      /* list-style-type: none; */
		text-decoration: none;
      }
    table
	  {
        border: 2px solid white;
        border-radius: 5px;
		width: 100%;
		font-size: 17px;
		align-items: center;
		justify-content: center;
		text-align: center;
       }
	   button{
		font-size: 15px;
		border-radius: 8px;
		margin: 5px;
		padding: 5px;
		width: 40%;
		border-color: aliceblue;
	   }
		input[type=submit]
		{ 
			background-color:lightgray;
			padding: 8px 10px;
			border: 2px solid white;
			border-radius: 5px;
			margin-left:93%;
			margin-top:2%;
		}
</style>
	
<title>Display record in PHP</title>
</head>
<body>
<form method="POST" action="form.php">
<input type="submit" name="insert"  value="INSERT">
</form>
<center>
<h2>Display Records</h2>
<table border="2">

<tr>
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Mobile No</th>
	<th>City</th>
	<!-- <th>Password</th> -->
	<th>Gender</th>
	<th>Subject</th>
	<th>Operations</th>
</tr>

<?php
include("connect.php");

$sql="SELECT  * FROM table3";
$data=mysqli_query($conn, $sql);

$total=mysqli_num_rows($data);

error_reporting(0);
echo $result['firstname']." ".$result['lastname']." ".$result['mobileno']." ".$result['city']
." ".$result['gender']." ".$result['subject'];

//echo $total;

if($total!=0)
{
	
	while ($result=mysqli_fetch_assoc($data))
	{
		echo "
		<tr>
		<td>".$result['id']."</td>
        <td>".$result['firstname']."</td>
        <td>".$result['lastname']."</td>
        <td>".$result['mobileno']."</td>
        <td>".$result['city']."</td>
        
        <td>".$result['gender']."</td>
        <td>".$result['subject']."</td>

        <td><button style='background-color:blue;'> <a href='update.php?id=$result[id]&firstname=$result[firstname]&lastname=$result[lastname]
		&mobileno=$result[mobileno]&city=$result[city]&gender=$result[gender]
		&subject=$result[subject]'>Update</a></button>
        
         <button style='background-color:red;'><a href='delete.php?id=$result[id]&firstname=$result[firstname]&lastname=$result[lastname]
		&mobileno=$result[mobileno]&city=$result[city]&gender=$result[gender]
		&subject=$result[subject]'> Delete</a></button></td>
        </tr>";
      
	}
	//echo "Table has records";
}
else
{
	echo "No records found";
}
?>
</center>
</table>
</body>
</html>