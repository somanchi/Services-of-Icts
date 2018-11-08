<!DOCTYPE>

     <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $username="root";
      $servername="localhost";
      $password="";
      $dbname="icts";
      $conn = new mysqli($servername, $username, $password, $dbname);
      $roll_num=$_POST['roll_num'];
      $staffid=$_POST['staffid'];
      $hoursspent=$_POST['hoursspent'];
      $serviceid=$_POST['serviceid'];
     
     
     
     if(isset($_POST['update']))
	{
      		$sql = "UPDATE requests SET Hours_spent = '$hoursspent' WHERE Client_id = '$roll_num' and Service_id = '$serviceid' and Staff_id = '$staffid'";

		if ($conn->query($sql) === TRUE)
			 {
    		 	 header("location:staff.php");
			}
	 else {
    	echo "Error updating record: " . $conn->error;
	}	
	}
}
  ?>


<form method="post" action="staff.php">
	<table>
		<tr>
			<td>Roll.No:</td>
			<td><input type="text" name="roll_num" class="textinput"></td>
		</tr>
		<tr>
			<td>Staff.id:</td>
			<td><input type="text" name="staffid" class="textinput"></td>
		</tr><tr>
			<td>Hours.Spent:</td>
			<td><input type="text" name="hoursspent" class="textinput"></td>
		</tr>
		
		</tr><tr>
			<td>ServiceID::</td>
			<td><input type="text" name="serviceid" class="textinput"></td>
		</tr>


		<tr>
			<td></td>
			<td><input type="submit" name="update" value="update"></td>
		</tr>


		<tr>
			<td></td>
			<td><input type="submit" name="List" value="Things To Do"></td>
		</tr>
	</table>
</form>


<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $username="root";
      $servername="localhost";
      $password="";
      $dbname="icts";
      $conn = new mysqli($servername, $username, $password, $dbname);
      $staffid = $_POST['staffid'];
     

if(isset($_POST['List']))
	{
      		$sql1 ="SELECT * FROM requests where Staff_id = '$staffid' and Hours_spent = 0";
		$query = $conn->query($sql1);
		  echo "<table border='1'>
					<tr>
					<th>Client id</th>
					<th>Service id</th>
					</tr>";
		while($row = $query->fetch_assoc())
				{   
				//echo "<tr><td>". $row['roll_no']."</td></tr>";
				
				echo "<tr>";
				echo "<td>" . $row['Client_id'] . "</td>";
				echo "<td>" . $row['Service_id'] . "</td>";
				echo "</tr>";
				}        

	}
}

 ?>