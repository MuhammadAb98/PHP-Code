
<?php include("connection.php");
    
error_reporting(0);
?>

<html>
<head>
<h1 style="background-color:White;text-align:center;border: 3px solid black">Update Record</h1>
</head>
<body style="background-color: #388E8E">
<br>
<br>

<form style="background-color:White;text-align:center;border: 3px solid black" action="" method="POST">
<br>
<h2>Enter your respective Roll Number to Update your record</h2> 
<br>
<input type="Text" name="Roll_number" value="">
<br>
<h2>Enter Name</h2> 
<br>
<input type="Text" name="Name" value="">
<br>
<h2>Enter Marks</h2> 
<br>
<input type="Text" name="Marks" value="">
<br>
<h2>Enter Contact</h2> 
<br>
 <input type="Text" name="Contact" value="">
<br>
<br>
<input style="font-size: 25px;background-color: #388E8E;color:white" type="submit" name="update_record" value="Submit">
<br>
<br>
<br>



<?php

if (isset($_POST['update_record']))
{
$Roll_number=$_POST['Roll_number'];
$Name=$_POST["Name"];
$Marks=$_POST["Marks"];
$Contact=$_POST["Contact"];

$query_update="update student_record SET  Name='$Name',Marks='$Marks',Contact='$Contact' where Roll_Number='$Roll_Number'";

$run_query_update= mysqli_query($conn,$query_update);

}

if($run_query_update)
		{
			echo "record updated ";
		}
		else
		{
			echo "not updates";
		}
?>
</form>
</body>

</html>