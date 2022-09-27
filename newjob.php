<?php

require 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>New job position </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<title>Document</title>
	<style>
		.container {
			min-height: 95vh;
		}
	</style>
</head>

<body>
	<?php include 'navbar.php'; ?>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<h1> New job Name </h1>

				<form action="newjobdata.php" method="post">

					<div class="form-group">
						<label for="position">Job name</label>
						<input type="text" class="form-control mb-2" name="position" placeholder="Enter position">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>

				</form>
				<?php if (isset($_SESSION['msg'])) {
					print_r($_SESSION['msg']);
					session_destroy();
				} ?>

			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>

</body>

</html>