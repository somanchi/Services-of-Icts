 <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $username="root";
      $servername="localhost";
      $password="";
      $dbname="icts";
      $conn = new mysqli($servername, $username, $password, $dbname);
	
	
	if(isset($_POST['delete'])){
			$sql=" SELECT * FROM icts_staff";
			$query=$conn->query($sql);
			echo "<table border='1'>
					<tr>
					<th>Staff id id</th>
					<th>Staff name</th>
					</tr>";
			while($row = $query->fetch_assoc()){   
				//echo "<tr><td>". $row['roll_no']."</td></tr>";
				
				echo "<tr>";
				echo "<td>" . $row['Staff_id'] . "</td>";
				echo "<td>" . $row['Staff_name'] . "</td>";
				echo "</tr>";
			}
		}
}
?>

<a href="client.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a>