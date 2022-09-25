<?php
$id = $_GET['id'];

require 'connect.php';

$sql = "SELECT * FROM employees WHERE id = $id";
$result = $conn->query($sql);
$employees = $result->fetch_assoc();
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> Employees </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<div class="container">
	<div class="row clearfix">
		<div class="col-md-3"></div>
		<div class="col-md-6">

			<?php if( isset($_SESSION['msg']) ) { ?>
				<br>
				<div class="alert alert-success" role="alert">
				  <?php echo $_SESSION['msg']; ?>
				</div>
			<?php  session_destroy(); } ?>

			<a href="index.php" class="btn">Home</a>

			<h1> employees Information </h1>

			<a href="edit.php?id=<?php echo $employees['id']; ?>" class="btn btn-primary btn-sm"> Edit </a>
			<br><br>
			<table class="table table-bordered table-sm">
				<tr>
					<th>firstname</th>
					<td><?php echo $employees['firstname']; ?></td>
				</tr>
				<tr>
					<th>lastname</th>
					<td><?php echo $employees['lastname']; ?></td>
				</tr>
				<tr>
					<th>email</th>
					<td><?php echo $employees['email']; ?></td>
				</tr>
				<tr>
					<th>project number</th>
					<select name="Positions">

                            <option value="0"></option>

                           

                            <?php

                                $sql = 'SELECT * FROM jobs';

                                $result_jobs = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($result_jobs)) { ?>

                                <option value="<?php echo $row['id']; ?>"><?php echo $row['position'] ;?></option>

                                <?php } ?>

                        </select>
				</tr>
			</table>


		</div>
	</div>
</div>
	
</body>
</html>


<!-- <td><?php echo $employees['jobId']; ?></td> -->
