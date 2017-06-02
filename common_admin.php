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
	$row=mysqli_fetch_array($run_user);
	$sql="SELECT no,type,amount_in_ml from blood_stock";
	$result=$conn->query($sql);
	
	//transaction print
	  
	$sql1="SELECT * from transaction";
	$result1=$conn->query($sql1);
	
	//upto here

	if($check_user>0)
	{
			echo "<br><br>&nbsp&nbsp THE  PRESENT  BLOOD  STOCK  AVAILABLE  IN  THE  BANK  IS : <br>";
			echo "<table border='4'>";
			echo "<tr>";
			echo "&nbsp<th>No</th>";
			echo "&nbsp<th>Blood Type</th>";
			echo "&nbsp<th>Available Stock (in ml)</th>";
			echo "</tr>";
			echo "<tr>";
			while($row=mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>&nbsp" . $row['no'] . "</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $row['type'] . "</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $row['amount_in_ml'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";		

			//          Here On

			echo "<br><br><br>&nbsp&nbsp&nbsp&nbsp THE  TRANSACTIONS  ARE : <br>";
			echo "<table border='4'>";
			echo "<tr>";
			echo "&nbsp<th>Opening Date</th>";
			echo "&nbsp<th>Opening Stock(in ml)</th>";
			echo "&nbsp<th>Donor ID</th>";
			echo "&nbsp<th>Donated Blood</th>";
			echo "&nbsp<th>Quantity Donated(in ml)</th>";
			echo "&nbsp<th>Acceptor ID</th>";
			echo "&nbsp<th>Accepted Blood</th>";
			echo "&nbsp<th>Quantity Accepted(in ml)</th>";
			echo "&nbsp<th>Cost(in Rs)</th>";
			echo "&nbsp<th>Closing Stock(in ml)</th>";
			echo "&nbsp<th>Closing Date</th>";
			echo "</tr>";
			echo "<tr>";
			while($row1=mysqli_fetch_array($result1))
			{
				echo "<tr>";
				echo "<td>&nbsp" . $row1['op_date'] . "</td>";
				echo "<td>&nbsp&nbsp&nbsp" . $row1['op_stock'] . "</td>";
				echo "<td>&nbsp&nbsp" . $row1['donor_id'] . "</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $row1['don_blood'] . "</td>";
				echo "<td>&nbsp&nbsp&nbsp&nbsp&nbsp" . $row1['quan_don'] . "</td>";
				echo "<td>&nbsp&nbsp" . $row1['acceptor_ID'] . "</td>";
				echo "<td>&nbsp&nbsp" . $row1['accep_blood'] . "</td>";
				echo "<td>&nbsp&nbsp" . $row1['quan_accep'] . "</td>";
				echo "<td>&nbsp&nbsp" . $row1['cost'] . "</td>";
				echo "<td>&nbsp&nbsp" . $row1['close_stock'] . "</td>";
				echo "<td>&nbsp&nbsp" . $row1['close_date'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";	
		}

	else
	{
		echo"Sorry...!!!!  Not a valid credentials";

	}
}
}

?>