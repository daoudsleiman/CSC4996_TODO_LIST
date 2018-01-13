<?php
	/* 
		Database class:
		Connect/close mariaDB.
	 */

	Class Database {

		protected $connection;//connection string
		private $host = "127.0.0.1";//host
		private $user = "root";//username
		private $password = "";//password
		private $db = "TODO_APP";//database

		public function open_connection()//opens database connection
		{
			$this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->db);

			if (mysqli_connect_errno())//error checking
		 	{
		  		echo "Database connection failed. Error message: " . mysqli_connect_error();
		  	}
		}

		public function close_connection()//closes database connection
		{
			if($this->connection != "")//checks if connection string is null
			{
				mysqli_close($this->connection);
			}
			else
			{
				echo "Database connection is not active";
			}
		}
	};
?>