<?php
	include("class_declarations.php");
	include("utilities.php");

	$db = new Database();
	$tasks = fetch_all_tasks($db);
?>

<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>TODO List</title>

	<link rel="stylesheet" href="css/style.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
	<!-- TODO list header -->
	<div class="jumbotron" align="center"><h1>TODO List</h1></div>

	<div class="container">
		
		IN PROGRESS HERE -- ADD BUTTONS THAT FILTER BY STATUS WHEN CLICKED

		<!-- Create new task button -->
		<div align="right">
			<button id="create_new_task" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create Task</button>
			<br/><br/>
		</div>

		<!-- Tasks table -->
		<table class="table table-bordered table-hover" id="task_table">
			<thead>
				<th>Task ID</th>
				<th>Task Name</th>
				<th>Status</th>
				<th>Due Date</th>
				<th>Delete</th>
			</thead>

			<tbody>
				<?php 
					$i=0;
					while($i< sizeof($tasks))
					{
				?>
					<tr>
						<td><?= $tasks[$i]['ID']?></td>
						<td><?= $tasks[$i]['TASK_NAME']?></td>
						<td><?= $tasks[$i]['STATUS']?></td>
						<td></td>
						<td align="center"><button class="btn btn-danger" data-id="<?= $tasks[$i]['ID']?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></button></td>
					</tr>
				<?	$i++;}
				?>
			</tbody>
		</table>

	</div>

</body>

<!--JS file-->
<script src="js/scripts.js"></script>
<!--Bootstrap JS-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</html>