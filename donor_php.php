<?php

if($_POST)
{
$conn= new mysqli('localhost','root','','mysql');
if($conn->connect_error)
{
	die("connection failed:". $conn->connect_error);
}
//echo"db connected successfully";
//echo"\n db is selected as test successfully";
$fname1=$_POST["fname1"];
$age1=$_POST["age1"];
$gender1=$_POST["gender1"];
$bg1=$_POST["bg1"];
$add1=$_POST["add1"];
$email1=$_POST["email1"];
$cno1=$_POST["cno1"];
$ddate=$_POST["ddate"];
$id1=$_POST["id1"];
$pd=$_POST["pd"];
$sql="INSERT INTO `donor` (`fname1`, `age1`, `gender1`, `bg1`, `add1`, `email1`, `cno1`, `ddate`, `id1`, `pd`) VALUES ('$fname1','$age1','$gender1','$bg1','$add1','$email1','$cno1','$ddate','$id1','$pd')";
$xyz=$conn->query($sql);
if($xyz==TRUE)
{
	echo "&nbsp      You Entered the following Details----";
	echo"<br><br><br>Name - ", $_POST["fname1"];
	echo"<br>Age - ", $_POST["age1"];
	echo"<br>Gender - ", $_POST["gender1"];
	echo"<br>Blood group - ", $_POST["bg1"];
	echo"<br>Address - ", $_POST["add1"];
	echo"<br>Email - ", $_POST["email1"];
	echo"<br>Contact Number - ", $_POST["cno1"];
	echo"<br>Last donated date - ",$_POST["ddate"];
	echo"<br>ID - ", $_POST["id1"];	
}
else{
	echo"Sorry...!!!!  Not a valid DONOR credentials";
}
$conn->close();
}
?>