<?php
	include("database.php");
	/* 
		Query class:
		Extends Database class,
		Run queries against mariaDB.
	 */

	Class Query extends Database {

		public function fetchDB($sql)//fetch function for select from database
		{
			$db = new Database;
			$db->open_connection();

			if($sql == '')//check if passed sql string is null
			{
				echo 'Empty string passed';
				return;
			}
			else
			{
				$fetched_array = array();

				$result = mysqli_query($db->connection, $sql);
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
				 	array_push($fetched_array, $row);
				}
			}

			$db->close_connection();

			return $fetched_array;
		}

		public function queryDB($sql) //for inserting and deleting
		{
			$db = new Database;
			$db->open_connection();

			if($sql == '')//check if passed sql string is null
			{
				echo 'Empty string passed';
				return;
			}
			else
			{
				if (mysqli_query($db->connection, $sql) === FALSE) 
				{
					echo "Error Inserting: " . $sql . "<br>" . ($db->connection)->error;
				} 
			}

			$db->close_connection();
		}

		public function multiQueryDB($sql) //for inserting an deleting multiple queries in same string
		{
			$db = new Database;
			$db->open_connection();

			if($sql == '')//check if passed sql string is null
			{
				echo 'Empty string passed';
				return;
			}
			else
			{
				if ($db->connection->multi_query($sql) === FALSE) 
				{
					echo "Error Inserting: " . $sql . "<br>" . ($db->connection)->error;
				} 
			}

			$db->close_connection();
		}
	};


?>