<?php
	include("../classes/query.php");

	$id = $_POST['id'];

	$query = new Query;

	$query->queryDB("DELETE FROM TODO_APP.TASK 
					 WHERE ID = '{$id}'"); //deletes from task and due_date
										   //Due date is set to on cascade delete

?>