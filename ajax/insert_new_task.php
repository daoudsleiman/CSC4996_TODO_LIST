<?php
	include("../classes/query.php");

	$name = $_POST['name'];
	$status = $_POST['status'];
	$due_date = $_POST['due_date'];

	$sql = "INSERT INTO TODO_APP.TASK (TASK_NAME, STATUS)
						VALUES('{$name}', '{$status}');";
	$sql.= "INSERT INTO TODO_APP.DUE_DATE (ID, DUE_DATE)
						VALUES(LAST_INSERT_ID(), '{$due_date}');";

	$query = new Query;

	$query->multiQueryDB($sql);					
				 	
	
?>