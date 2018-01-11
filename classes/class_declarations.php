<?php

	/* 
		Database class to connect to mysql database.
	   	Also basic helper functions such as fetch/query 
	 */
	Class Database {

		private $connection;//connection string
		private $host = "127.0.0.1";//host
		private $user = "TODOUSER";//username
		private $password = "123user";//password
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

		public function fetch($sql)//fetch function for fetching data from database
		{
			if($sql == '')//check if passed sql string is null
			{
				return;
			}
			else
			{
				$fetched_array = array();
				$result = mysqli_query($this->connection, $sql);

				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					array_push($fetched_array, $row);
				}
			}

			return $fetched_array;//2d array of all rows in database returned from query 
		}
	};

	Class Task {

	};

	Class Fetch extends Database {

	};

?>