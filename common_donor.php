<?php
 if($_POST)
 {
$conn= new mysqli('localhost','root','','mysql');
if($conn->connect_error)
{
	die("connection failed:". $conn->connect_error);
}

if(isset($_POST['submit']))
{
	$id1=mysqli_real_escape_string($conn,$_POST['id1']);
	$pd=mysqli_real_escape_string($conn,$_POST['pd']);
	$type=mysqli_real_escape_string($conn,$_POST["type"]);
	$amount=mysqli_real_escape_string($conn,$_POST["amount"]);
	$new_date=mysqli_real_escape_string($conn,$_POST["new_date"]);
	$sel_user="SELECT * from donor where id1='$id1' and pd='$pd'";
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

	$sql="UPDATE blood_stock SET amount_in_ml=amount_in_ml+'$amount' where type='$type'";
	if($conn->query($sql)===TRUE)
		echo"<br><br>RECORD UPDATED SUCCESSFULLY<br>";
	else
		echo"error updating record".$conn->error;
	if($check_user>0)
	{
		/*echo "<br>&nbsp Your Personal Details Are :<br>";
		echo"<br><br><br>&nbsp ID-".$row['id1'];
		echo"<br>&nbsp name-".$row['fname1'];
		echo"<br>&nbsp blood group-".$row['bg1'];
		echo"<br>&nbsp  last donated date-".$row['ddate'];
		echo"<br>&nbsp  New donated date-".$row['new_date'];
		echo"<br>&nbsp password-".$row['pd'];*/
		echo"<br><br>&nbsp&nbsp&nbspIn this transaction, You donated your ".$amount." ml of blood to save someone's life. <br><br>&nbsp&nbsp&nbspThat's Really Great...!!!";

		//Retrieving Part

		$final_stock="SELECT amount_in_ml from blood_stock where type='$type'";
		$conn3=mysqli_query($conn,$final_stock);
		$conn4=mysqli_fetch_array($conn3);
		$final_val=$conn4['amount_in_ml'];
				echo "<br>Final Stock is Updated...!!!";
		//echo "<br>Final value : ".$final_val;
		//

		$imp="INSERT INTO `transaction` (`op_date`,`op_stock`,`donor_id`,`don_blood`,`quan_don`,`acceptor_ID`,`accep_blood`,`quan_accep`,`cost`,`close_stock`,`close_date`) VALUES ('$new_date','$start_val','$id1','$type','$amount','---','---',0,0,'$final_val','$new_date')";
		$res=$conn->query($imp);
			if($res==TRUE)
				echo"<br><br>Transaction table has been successfully updated...!!!";
			else
				echo"ERROR UPDATING RECORD".$conn->error;

		//Another One
		echo "<br><br><br> YOUR CURRENT TRANSACTION IS : <br>";
			echo "<table border='4'>";
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>&nbsp&nbspName&nbsp&nbsp</th>";
			echo "<th>&nbspBlood Group</th>";
			echo "<th>&nbspQuantity(in ml)</th>";
			echo "<th>Last donated on</th>";
			echo "<th>Password</th>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>&nbsp&nbsp".$row['id1']."&nbsp</td>";
				echo "<td>&nbsp".$row['fname1']."</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $type. "</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $amount. "</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $new_date . "</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $row['pd'] . "</td>";
				echo "</tr>";
				echo "</table>";

		//Upto Here
	}
	else
	{
		echo"Sorry...!!!!  Not a valid DONOR credentials";

	}
}

}
?>