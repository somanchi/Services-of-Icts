     <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $username="root";
      $servername="localhost";
      $password="";
      $dbname="icts";
      $conn = new mysqli($servername, $username, $password, $dbname);
      $roll_num=$_POST['roll_num'];
	
      if(isset($_POST['search_btn'])){
			$sql=" SELECT * FROM `icts`.requests where Client_id ='$_POST[roll_num]' ";
			$query=$conn->query($sql);
			echo "<table border='1'>
					<tr>
					<th>Client id</th>
					<th>Service id</th>
					<th>Staff id</th>
					<th>Completion Status</th>
					</tr>";
			while($row = $query->fetch_assoc()){   
				//echo "<tr><td>". $row['roll_no']."</td></tr>";
				
				echo "<tr>";
				echo "<td>" . $row['Client_id'] . "</td>";
				echo "<td>" . $row['Service_id'] . "</td>";
				
				if( $row['Staff_id'] == 'null')
					echo "<td>" ."Admin". "</td>";
				else
					echo "<td>" . $row['Staff_id'] . "</td>";

				if ($row['Hours_spent'] == 0)
					echo "<td>" ."Yet To be Processed" . "</td>";
				else
					echo "<td>" ."Processed" . "</td>";
				echo "</tr>";
			}
		}
     
      if ($conn->query($result) === TRUE) {
          echo "<table border='1'>
	<tr>
	<th>Client id</th>
	<th>Service id</th>
	<th>Staff id</th>
	<th>hours spent</th>
	</tr>";
	while($row = mysqli_fetch_array($result))
	{
	echo "<tr>";
	echo "<td>" . $row['Client_id'] . "</td>";
	echo "<td>" . $row['Service_id'] . "</td>";
	echo "<td>" . $row['Staff_id'] . "</td>";
	echo "<td>" . $row['Hours_spent'] . "</td>";
	echo "</tr>";
	}
echo "</table>";
      } 
      else {
          echo "Error: " .  "<br>" . $conn->error;
      }
          
    }
  ?>

<div class="header">
	<h1> Status </h1>
</div>

<form method="post" action="thankyou.php">
	<table>
		<tr>
			<td>Roll.No:</td>
			<td><input type="text" name="roll_num"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="search_btn" value="search"></td>
		</tr>
	</table>

<li class="breadcrumb-item"><a href="client.php">Back</a></li>
