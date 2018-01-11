<?php
	function fetch_all_tasks($db)
	{
		$db->open_connection();

		$sql = "SELECT * FROM TASK";

		$all_tasks = $db->fetch($sql);

		$db->close_connection();

		return $all_tasks;
	}

	//fetch tasks by status

?>