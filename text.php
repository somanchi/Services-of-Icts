 <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $username="root";
      $servername="localhost";
      $password="";
      $dbname="icts";
      $conn = new mysqli($servername, $username, $password, $dbname);
	
	
	if(isset($_POST['delete'])){
			$sql=" SELECT * FROM services";
			$query=$conn->query($sql);
			echo "<table border='1'>
					<tr>
					<th>Service id</th>
					<th>Service</th>
					</tr>";
			while($row = $query->fetch_assoc()){   				
				echo "<tr>";
				echo "<td>" . $row['Service_id'] . "</td>";
				echo "<td>" . $row['Service_requested'] . "</td>";
				echo "</tr>";
			}
		}
}
?>

<a href="client.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a>