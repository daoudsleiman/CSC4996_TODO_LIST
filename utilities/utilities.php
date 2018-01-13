<?php
	include("classes/query.php");
	include("classes/task.php");

	function initialize_tasks() //creates all task objects
	{
		$query = new Query; 

		$sql_fetch_all_tasks = "SELECT TASK.ID, TASK_NAME, STATUS, DUE_DATE 
		 						FROM TODO_APP.TASK 
		 						LEFT JOIN TODO_APP.DUE_DATE 
		 						ON TODO_APP.TASK.ID = TODO_APP.DUE_DATE.ID"; //combine task and due date table

		$all_tasks = $query->fetchDB($sql_fetch_all_tasks);

		$tasks = array();

		$i=0;
		while($i<sizeof($all_tasks))
		{
			$task = new Task($all_tasks[$i]['ID'], $all_tasks[$i]['TASK_NAME'], $all_tasks[$i]['STATUS'], $all_tasks[$i]['DUE_DATE']); //new task

			array_push($tasks, $task); //push into task objects array

			$i++;
		}

		return $tasks;
	}

	function count_tasks($status) //tasks counter
	{
		$query = new Query;

		if($status != '')
		{
			$sql_count_tasks = "SELECT COUNT(*) FROM TODO_APP.TASK
								WHERE STATUS = '{$status}'"; //for other status'
		}
		else
		{
			$sql_count_tasks = "SELECT COUNT(*) FROM TODO_APP.TASK"; //for show all
		}

		$count = $query->fetchDB($sql_count_tasks);

		return $count[0]['COUNT(*)'];//return only the number
	}

?>