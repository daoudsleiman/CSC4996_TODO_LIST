<?php
	include("../classes/query.php");

	$id = $_POST['id'];

	$query = new Query;

	$query->queryDB("DELETE FROM TODO_APP.TASK 
					 WHERE ID = '{$id}'");

?>