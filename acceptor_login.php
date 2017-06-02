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
	$id=mysqli_real_escape_string($conn,$_POST['id']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$sel_user="SELECT * from acceptor where id='$id' and password='$password'";
	$run_user=mysqli_query($conn,$sel_user);
	$check_user=mysqli_num_rows($run_user);
	$row=mysqli_fetch_array($run_user);
	if($check_user>0)
	{
		echo"<br>&nbsp&nbspYour Personal Details are :---";
		echo"<br><br>&nbsp&nbspID-".$row['id'];
		echo"<br>&nbsp&nbspName-".$row['fname'];
		echo"<br>&nbsp&nbspRequested Blood group-".$row['bg'];
		echo"<br>&nbsp&nbspConsultant name-".$row['cname'];
		echo"<br><br><br>&nbsp&nbsp&nbsp&nbspTRANSACTION  DETAILS  ARE  AS  FOLLOWS : ";
		echo"<br><br>&nbsp&nbsp&nbsp&nbsp|Blood Requested | Don_Date | Quan_Donated | Cost | ";
		echo"<br>&nbsp&nbsp&nbsp&nbsp".$row['bg']."&nbsp&nbspWork it&nbsp&nbsp".$

	}
	else
	{
		echo"<br>sSorry...!!!!  Not a valid ACCEPTOR credentials";

	}
}

}
?>