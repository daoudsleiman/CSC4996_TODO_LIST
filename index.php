<?php
	include("utilities/utilities.php");

	//start functions
	$tasks = initialize_tasks();
	$total = count_tasks('');
	$started = count_tasks('STARTED');
	$pending = count_tasks('PENDING');
	$completed = count_tasks('COMPLETED');
	$late = count_tasks('LATE');
	//end functions
?>

<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta charset="utf-8">

	<title>TODO List</title>

	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- JQuery Datatables CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

</head>

<body>
	<!-- TODO list header -->
	<div class="jumbotron" align="center"><h1>TODO List</h1></div>

	<div class="container" style="padding-bottom: 100px">
		<div align="center">
			<h4>Click to change status view</h4>

			<div class="row">
				<button class="btn btn-default">Show All: <?= $total?></button>
				<button class="btn btn-info">Started: <?= $started?></button>
				<button class="btn btn-warning">Pending: <?= $pending?></button>
				<button class="btn btn-success">Completed: <?= $completed?></button>
				<button class="btn btn-danger">Late: <?= $late?></button>
			</div>

		</div>

		<!-- Create new task button -->
		<div align="right">
			<button id="create_new_task" class="btn btn-success" data-toggle="modal" data-target="#create_task_modal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create Task</button>
			<br/><br/>
		</div>

		<!-- Tasks table -->
		<table class="table table-bordered table-hover" id="task_table">
			<thead>
				<th>Task ID</th>
				<th>Task Name</th>
				<th>Status</th>
				<th>Due Date (YYYY-MM-DD)</th>
				<th>Delete</th>
			</thead>

			<tbody>
				<?php 
					foreach ($tasks as $task)
					{
				?>
					<tr>
						<td><?= $task->get_id() ?></td>
						<td><?= $task->get_name()?></td>
						<td><?= $task->get_status()?></td>
						<td><?= $task->get_due_date() ?></td>
						<td align="center"><button class="btn btn-danger delete_task_btn" data-id="<?= $task->get_id() ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></button></td>
					</tr>
				<?	}
				?>
			</tbody>
		</table>

	</div>

</body>

<!-- Create Task Modal -->
<div class="modal fade" id="create_task_modal" role="dialog">
	 <div class="vertical-alignment-helper"> <!-- aligns modal center vertically -->
        <div class="modal-dialog vertical-align-center"><!-- aligns modal center horizontally -->
			<div class="modal-content">
				<div class="modal-header bg-success">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Create a New Task</h3>
				</div>
				<div class="modal-body">
					<form id="new_task_form">
						<label for="name">Name:</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter a name for the task"/><br/>

						<label for="status">Status:</label>
						<select class="form-control" id="status" name="status">
							<option>Make a Selection</option>
							<option value="STARTED">Started</option>
							<option value="PENDING">Pending</option>
							<option value="COMPLETED">Completed</option>
							<option value="LATE">Late</option>
						</select><br/>

						<label for="date">Due Date:</label>
						<input type="date" class="form-control" id="due_date" name="due_date" placeholder="Enter a due date for the task"/>
					</form>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" style="float:left;" id="submit_new_task">Submit</button>
					<button class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- JQuery JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- JQuery Datatables JS -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!--Bootstrap JS-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--JS file-->
<script src="js/scripts.js"></script>

</html>