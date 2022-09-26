<?php

	require 'connect.php';

	$sql = "SELECT * FROM employees";
	$result = $conn->query($sql);
	$employees = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New employeess </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
    <style>
       .container {
        min-height: 95vh;
       }
    </style>
</head>
<body>
<?php include 'navbar.php';?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h1> New employees Information </h1>
			
			<form action="insertdata.php" method="post">
			  
			  <div class="form-group">
			    <label for="firstname">firstname</label>
			    <input type="text"  class="form-control" name="firstname" placeholder="Enter firstname">
			  </div>

			  <div class="form-group">
			    <label for="lastname">lastname</label>
			    <input type="text"   class="form-control" name="lastname" placeholder="Enter lastname">
			  </div>

			  <div class="form-group">
			    <label for="email">email</label>
			    <input type="text"   class="form-control" name="email" placeholder="Enter email">
			  </div>

			  <div class="form-group">
			  <select name="jobId">
			  <label for="position">Position</label>
				<option value="0"></option>
				<?php
					$sql1 = 'SELECT DISTINCT j_id, position FROM jobs';
					$result_jobs = mysqli_query($conn, $sql1);
					while ($row = mysqli_fetch_array($result_jobs)) { ?>
					<option value="<?php echo $row['j_id']; ?>"><?php echo $row['position'] ;?></option>
					<?php } ?>
				</select>
			  </div>

			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>


		</div>
	</div>
</div>
<?php include 'footer.php'; ?>

</body>
</html>