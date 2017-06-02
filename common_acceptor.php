<?php
 if($_POST)
 {
$conn=mysqli_connect('localhost','root','','mysql');
if($conn->connect_error)
{
	die("connection failed:". $conn->connect_error);
}
/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/

/* if('$amount'>'$start_val')
	{
		echo"<br><br>Sorry. Required stock is not available...!!!";		
	}
	else
*/

if(isset($_POST['submit']))
{
	$id=mysqli_real_escape_string($conn,$_POST['id']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$type=mysqli_real_escape_string($conn,$_POST['type']);
	$amount=mysqli_real_escape_string($conn,$_POST['amount']);
	$amount=(int)($amount);
	$new_date=mysqli_real_escape_string($conn,$_POST['new_date']);
	$cost=$amount*10;		//stores the total cost of the blood
	$sel_user="SELECT * from acceptor where id='$id' and password='$password'";
	$run_user=mysqli_query($conn,$sel_user);
	$check_user=mysqli_num_rows($run_user);
	$row=mysqli_fetch_array($run_user);

	$start_stock="SELECT amount_in_ml from blood_stock where type='$type'";
	$conn1=mysqli_query($conn,$start_stock);
	//while($row=mysqli_fetch_array($result))
	$conn2=mysqli_fetch_array($conn1);

	/*while($conn2=mysqli_fetch_array($conn1))
	{
		echo "<br>Starting stock is : ".$conn2['amount_in_ml'];
	}*/
	$start_val=$conn2['amount_in_ml'];
	//echo "<br>Starting Value : ".$start_val;

	
	$sql="UPDATE blood_stock SET amount_in_ml=amount_in_ml-'$amount' where type='$type'";
	{
		if(mysqli_query($conn,$sql))
			if(mysqli_query($conn,$start_stock))
		{
		
		echo"<br>&nbsp&nbsp&nbsp<br><br>RECORD UPDATED SUCCESSFULLY <br>";
		echo"<br><br>New Date : ".$new_date;
		$final_stock="SELECT amount_in_ml from blood_stock where type='$type'";
		$conn3=mysqli_query($conn,$final_stock);
		$conn4=mysqli_fetch_array($conn3);
		$final_val=$conn4['amount_in_ml'];
				echo "<br><br>Final Stock is Updated...!!!";
		//echo "<br><br>Final value : ".$final_val;

		echo "<br>";


		//$imp="INSERT INTO `transaction`(`op_date`, `op_stock`, `donor_id`, `don_blood`, `quan_don`, `acceptor_ID`, `accep_blood`, `quan_accep`, `cost`, `close_stock`, `close_date`) VALUES (132,215,2112,6545,6844,4546,54,1222,1,1,12)";

		//$imp="INSERT INTO `transaction`(`op_date`, `op_stock`, `donor_id`, `don_blood`, `quan_don`, `acceptor_ID`, `accep_blood`, `quan_accep`, `cost`, `close_stock`, `close_date`) VALUES ('$new_date',$start_stock,'$id','$type',$amount,'$id','$type',$amount,$cost,$final_stock,'$new_date')";

		$imp="INSERT INTO `transaction` (`op_date`,`op_stock`,`donor_id`,`don_blood`,`quan_don`,`acceptor_ID`,`accep_blood`,`quan_accep`,`cost`,`close_stock`,`close_date`) VALUES ('$new_date','$start_val','---','---',0,'$id','$type','$amount','$cost','$final_val','$new_date')";

		$res=$conn->query($imp);
		if($res==TRUE)
			echo"<br><br>Transaction table has been successfully updated...!!!";
		else
			echo"<br><br>A check<br>What to do";
		}
	else
		echo"ERROR UPDATING RECORD".$conn->error;
	}
	if($check_user>0)
	{
		/*echo "<br>&nbsp&nbsp&nbsp&nbsp Your Personal Details Are :";
		echo"<br><br>&nbsp&nbsp&nbsp&nbspID-".$row['id'];
		echo"<br>&nbsp&nbsp&nbsp&nbspName-".$row['fname'];
		echo"<br>&nbsp&nbsp&nbsp&nbspBlood group-".$row['bg'];
		echo"<br>&nbsp&nbsp&nbsp&nbspPassword-".$row['password'];
		echo"<br><br><br>&nbsp&nbsp&nbsp&nbspTRANSACTION  DETAILS  ARE  AS  FOLLOWS : ";		//Printing  the  transaction  details
		echo"<br><br>&nbsp&nbsp&nbsp&nbsp|| Blood Requested || Don_Date || Quan_Required || &nbsp Cost &nbsp  || ";
		echo"<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$type;
		echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Work it";
		echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$amount."&nbsp&nbspml";
		echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$cost."Rs";*/
		//just a try
		echo "<br><br><br> YOUR PERSONAL DETAILS ARE : <br>";
			echo "<table border='4'>";
			echo "<tr>";
			echo "&nbsp<th>ID</th>";
			echo "&nbsp<th>&nbsp&nbspName&nbsp&nbsp&nbsp</th>";
			echo "&nbsp<th>Blood Group</th>";
			echo "&nbsp<th>Password</th>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>&nbsp&nbsp" . $row['id'] . "</td>";
				echo "<td>&nbsp&nbsp".$row['fname']."</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $type. "</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $row['password']."</td>";
				echo "</tr>";
				echo "</table>";

		//Another try
		echo "<br><br><br> YOUR CURRENT TRANSACTION IS : <br>";
			echo "<table border='4'>";
			echo "<tr>";
			echo "&nbsp<th>Blood request</th>";
			echo "&nbsp<th>Donation date</th>";
			echo "&nbsp<th>Quantity_Req(in ml)</th>";
			echo "&nbsp<th>Cost(in Rs)</th>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $type . "</td>";
				echo "<td>&nbsp&nbsp".$new_date."</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $amount. "</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $cost . "</td>";
				echo "</tr>";
				echo "</table>";

			//upto here
	}
	else
	{
		echo"<br><br>WRONG INPUT. THIS IS NOT A VALID ACCEPTOR!!!!";

	}
}

}
?>