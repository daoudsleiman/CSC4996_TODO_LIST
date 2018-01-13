<?php
	/* 
		Task class:
		Used for each task from database -> php task
	 */

	Class Task {

		private $task_id; //id for each task
		private $task_name; //task name
		private $task_status; //task status
		private $task_due_date; //task due date

		public function __construct($taskId, $taskName, $taskStatus, $taskDueDate)//constructor to create task object
		{
		    $this->task_id = $taskId;
		    $this->task_name = $taskName;
		    $this->task_status = $taskStatus;
		    $this->task_due_date = $taskDueDate;
  		}

		public function get_id() //get id
		{
			return $this->task_id;
		}

		public function get_name() //get name
		{
			return $this->task_name;
		}

		public function get_status() //get status
		{
			return $this->task_status;
		}

		public function get_due_date() //get due date
		{
			return $this->task_due_date;
		}

	};
?>