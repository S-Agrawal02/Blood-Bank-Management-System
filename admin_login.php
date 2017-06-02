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
	$sel_user="SELECT * from admin where id='$id' and password='$password'";
	$run_user=mysqli_query($conn,$sel_user);
	$check_user=mysqli_num_rows($run_user);
	$sel_user1="SELECT id,fname,age,gender,bg,cname,add,email,cno from acceptor";
	$run_user1=mysqli_query($conn,$sel_user1);
	$check_user1=mysqli_num_rows($run_user1);
	$row1=mysqli_fetch_array($run_user1);
	if($check_user>0)
	{
		echo"acceptor--";
		for($row=0;$row<$row1;$row++)
		{
		echo"ID-".$row['id'];
		echo"<br>name-".$row['fname'];
		echo"<br>age-".$row['age'];
		echo"<br>gender-".$row['gender'];
		echo"<br>blood group-".$row['bg'];
		echo"<br>consultant name-".$row['cname'];
		echo"<br>address-".$row['add'];
		echo"<br>email-".$row['email'];
		echo"<br>phone number-".$row['cno'];
		}
	}
	else
	{
		echo"Sorry...!!!!  Not a valid ADMIN credentials";

	}
}

}
?>