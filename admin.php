<!DOCTYPE>

     <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $username="root";
      $servername="localhost";
      $password="";
      $dbname="icts";
      $conn = new mysqli($servername, $username, $password, $dbname);
      $roll_num=$_POST['roll_num'];
      $complaint=$_POST['complaint'];
      $staff = $_POST['staff'];
     
      if(isset($_POST['update']))
	{
      		$sql = "UPDATE requests SET Staff_id = '$staff' WHERE Client_id = '$roll_num' and Service_id = '$complaint' ";

		if ($conn->query($sql) === TRUE)
			 {
    		  header("location:admin.php");
			}
	 else {
			echo "<script>alert('Wrong UserName or Password');</script>";		 
	}	
	}

    }
  ?>


<form method="post" action="admin.php">
	<table>
		<tr>
			<td>Roll.No:</td>
			<td><input type="text" name="roll_num" class="textinput"></td>
		</tr>
		<tr>
			<td>Complaint:</td>
			<td><input type="text" name="complaint" class="textinput"></td>
		</tr>
		<tr>
			<td>Staff:</td>
			<td><input type="text" name="staff" class="textinput"></td>
		</tr>
	
		<tr>
			<td></td>
			<td><input type="submit" name="update" value="submit"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="list" value="List of works to be assigned"></td>
		</tr>
	</table>
</form>


<form method="post" action="text2.php">
	<table>
		<tr>
			<td></td>
			<td><input type="submit" name="delete" value="More info"></td>
		</tr>
	</table>
</form>


<form method="post" action="text5.php">
	<table>
		<tr>
			<td></td>
			<td><input type="submit" name="delete" value="Staff info"></td>
		</tr>
	</table>
</form>


<form method="post" action="text4.php">
	<table>
		<tr>
			<td></td>
			<td><input type="submit" name="delete" value="Detailed view of assigned staff"></td>
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
      $roll_num=$_POST['roll_num'];
      $complaint=$_POST['complaint'];
      $staff = $_POST['staff'];
     


if(isset($_POST['list']))
	{
      		$sql1 ="SELECT * FROM requests where Staff_id = 'null'";
		$query = $conn->query($sql1);
		  echo "<table border='1'>
					<tr>
					<th>Client id</th>
					<th>Service id</th>
					<th>Staff id</th>
					</tr>";
		while($row = $query->fetch_assoc())
				{   
				//echo "<tr><td>". $row['roll_no']."</td></tr>";
				
				echo "<tr>";
				echo "<td>" . $row['Client_id'] . "</td>";
				echo "<td>" . $row['Service_id'] . "</td>";
				echo "<td>" . $row['Staff_id'] . "</td>";
				echo "</tr>";
				}        

	}
}
 ?>