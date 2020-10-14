<?php include("connection.php");
error_reporting(0);
?>

<HTML>
<head>
<h1 style="background-color:White;text-align:center;border: 3px solid black">Welcome To Registration Portal</h1>
</head>
<body style="background-color: #388E8E">
<br>
<br>



<form style="background-color:White;text-align:center;border: 3px solid black" action="" method="POST">
<br>
<h2>Enter Roll Number</h2> 
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
     <input type="Text" name="Contact" value="OPTIONAL">
<br>
<br>
<input style="font-size: 25px;background-color: #388E8E;color:white" type="submit" name="submit" value="Submit">
<br>

<br>
<br>


<?php

$Roll_number=$_POST["Roll_number"];

$Name=$_POST["Name"];

$Marks=$_POST["Marks"];
$Contact=$_POST["Contact"];

if (isset($Roll_number) && isset($Name) && isset($Marks) && !empty($Roll_number)&& !empty ($Name)&&!empty ($Marks))
{
$query="insert into student_record values('$Roll_number','$Name','$Marks','$Contact')";


$data=mysqli_query($conn,$query);
if($data)
{?>
  <h2>Data Entered</h2>
<?php  
	
}
else
{echo "Failed to enter Data";
}}
else 
{?>
<h2>Must Fill All Fields</h2>

<?php	
}
?>

</form>
<br>
<br>
<br>


<form style="text-align:center;background-color:White;text-align:center;border: 3px solid black" action="" method="POST">
<h1 >Search By Roll Number</h1>
<h2 >Enter Value</h2>
<input type="Text" name="search" value=""><br><br>
<input style="font-size: 20px;background-color: #388E8E;color:white" type="submit" name="search_submit" value="Search One">
<br>
<br>
<input style="font-size: 20px;background-color: #388E8E;color:white" type="submit" name="search_all_submit" value="Search All">
<br>
<br>
<input style="font-size: 20px;background-color: #388E8E;color:white" type="submit" name="delete_one" value="Delet Record">
<br>
<br>
<input style="font-size: 20px;background-color: #388E8E;color:white" type="submit" name="update_page" value="update">



</form>

<?php
if (isset($_POST['search_submit']))
{
$Roll_number=$_POST['search'];
$query="Select *from student_record where Roll_number='$Roll_number'";
$run_query= mysqli_query($conn,$query);

while ($row=mysqli_fetch_array($run_query))
{
 ?>
 <Table style="width:100%; background-color:White;text-align:center;border: 3px solid black;font-size:20px">
 <tr>
 <td style="text-align:center"> <?php echo "ROLL NUMBER :".$row['Roll_Number'];?></td>
 <td style="text-align:center"> <?php echo "NAME :".$row['Name'];?></td>
 <td style="text-align:center"> <?php echo "Marks :".$row['Marks'];?></td>
 <td style="text-align:center"> <?php echo "Contact :".$row['Contact'];?></td></table>
<?php 

}}
?>
<br>
<br>
<br>


<?php

if (isset($_POST['search_all_submit']))
{
$Roll_number=$_POST['search'];

$query="select* from student_record";

$run_query= mysqli_query($conn,$query);

while ($show=mysqli_fetch_assoc($run_query))
{
 ?>
 <Table style="width:100%; background-color:White;text-align:center;border: 3px solid black;font-size:20px">
 <tr>
 <td Style="text-align:left;float:left; width:300px ; padding-left:10px"> <?php echo "ROLL NUMBER :".$show['Roll_Number'];?></td>
 <td Style="text-align:left;float:left; padding-left:5px"> <?php echo "NAME :".$show['Name'];?></td>
 <td Style="text-align:center;float:right; width:100px;padding-right:550px"> <?php echo "Marks :".$show['Marks'];?></td>
 <td Style="text-align:left"> <?php echo "Contact :".$show['Contact'];?></td></table>
 
<?php 
}}
?>

<br>

<?php
if (isset($_POST['delete_one']))
{
$Roll_number=$_POST['search'];

$query="DELETE from student_record where Roll_number='$Roll_number'";

$run_query= mysqli_query($conn,$query);

$query="select* from student_record";

$run_query= mysqli_query($conn,$query);

while ($show=mysqli_fetch_assoc($run_query))
{
 ?>
 <Table style="width:100%; background-color:White;text-align:center;border: 3px solid black;font-size:20px">
 <tr>
 <td> <?php echo "ROLL NUMBER :".$show['Roll_Number'];?></td>
 <td> <?php echo "NAME :".$show['Name'];?></td>
 <td> <?php echo "Marks :".$show['Marks'];?></td>
 <td> <?php echo "Contact :".$show['Contact'];?></td></table>
 
<?php 
}}
?>


<?php

if (isset($_POST['update_page']))
{
  header('location:Display.php');	

}
?>




</body>

</html>



