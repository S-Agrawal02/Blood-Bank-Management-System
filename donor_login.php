<?php
 if($_POST)
 {
$conn= new mysqli('localhost','root','','mysql');
if($conn->connect_error)
{
	die("connection failed:". $conn->connect_error);
}
/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/

if(isset($_POST['submit']))
{
	$id1=mysqli_real_escape_string($conn,$_POST['id1']);
	$pd=mysqli_real_escape_string($conn,$_POST['pd']);
	$sel_user="SELECT * from donor where id1='$id1' and pd='$pd'";
	$run_user=mysqli_query($conn,$sel_user);
	$check_user=mysqli_num_rows($run_user);
	$row=mysqli_fetch_array($run_user);
	if($check_user>0)
	{
		echo "<br>&nbsp Your Personal Details Are :";
		echo"<br><br><br>ID-".$row['id1'];
		echo"<br>name-".$row['fname1'];
		echo"<br>blood group-".$row['bg1'];
		echo"<br> last donated date-".$row['ddate'];
		echo"<br>password-".$row['pd'];
	}
	else
	{
		echo"Sorry...!!!!  Not a valid DONOR credentials";

	}
}

}
?>