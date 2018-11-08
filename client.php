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
     
      if(isset($_POST['login_btn'])){
       $query = "INSERT INTO icts.`requests` (`Client_id`, `Service_id`, `Staff_id`, `Hours_spent`) VALUES ('$roll_num', '$complaint','null','null');";
	}
       
      if ($conn->query($query) === TRUE) {
          header("location:thankyou.php");
      } 
      else {
          echo "Error: " . $query . "<br>" . $conn->error;
      }
          
    }

 ?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>




<head>
	<title>Client</title>
</head>
<body>
<div class="header">
	<h1> Complaint Request </h1>
</div>

<form method="post" action="client.php">
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
			<td></td>
			<td><input type="submit" name="login_btn" value="submit"></td>
		</tr>
	</table>
</form>


<div class="header">
	<h1> Status </h1>
</div>

<form method="post" action="thankyou.php">
	<table>
		<tr>
			<td>Roll.No:</td>
			<td><input type="text" name="roll_num" class="textinput"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="search_btn" value="search"></td>
		</tr>
	</table>
</form>


<form method="post" action="text.php">
	<table>
		<tr>
			<td></td>
			<td><input type="submit" name="delete" value="List of Services"></td>
		</tr>
	</table>
</form>



</body>
</html>