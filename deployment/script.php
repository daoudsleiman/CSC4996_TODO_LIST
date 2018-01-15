<?php
/*
	This deployment script will create the database
	and all necessary tables to run the application.
	If you see message "Database created successfully",
	and no other messages, you are ready to use the app.
*/

	$host = "127.0.0.1";
	$user = "root";
	$pass = "";
	$db = "TODO_APP";


	//CREATE DATABASE FIRST
	// Create connection
	$conn = new mysqli($host, $user, $pass);

	// Check connection
	if ($conn->connect_error) {
	die("Could not connect " . $conn->connect_error);
	} 

	$sql = "CREATE DATABASE TODO_APP";

	if ($conn->query($sql) === TRUE) {
	echo "Database created successfully";
	} else {
	echo "Error creating database: " . $conn->error;
	}

	$conn->close();


	//SQL MULTIQUERY TO CREATE ALL TABLES
	$conn2 = new mysqli($host, $user, $pass, $db);

	/* check connection */
	if ($conn2->connect_error) {
	die("Could not connect " . $conn2->connect_error);
	} 

	//CREATE STATUS TABLE
	$sql = "CREATE TABLE TODO_APP.STATUS (
		 	STATUS VARCHAR(25),
			PRIMARY KEY(STATUS));";

	//INSERT DEFAULT STATUS'
	$sql .= "INSERT INTO TODO_APP.STATUS (STATUS) VALUES('STARTED');";
	$sql .= "INSERT INTO TODO_APP.STATUS (STATUS) VALUES('PENDING');";
	$sql .= "INSERT INTO TODO_APP.STATUS (STATUS) VALUES('COMPLETED');";
	$sql .= "INSERT INTO TODO_APP.STATUS (STATUS) VALUES('LATE');";

	//CREATE TASK TABLE
	$sql .= "CREATE TABLE TODO_APP.TASK (
		     ID INTEGER NOT NULL AUTO_INCREMENT,
		     TASK_NAME VARCHAR(30) NOT NULL,
		     STATUS VARCHAR(25),
		     PRIMARY KEY (ID),
		     FOREIGN KEY (STATUS) references STATUS(STATUS) ON UPDATE CASCADE);";

	//CREATE DUE DATE TABLE
	$sql .= "CREATE TABLE TODO_APP.DUE_DATE (
		    ID INTEGER,
		    DUE_DATE DATE,
		    PRIMARY KEY(ID, DUE_DATE),
		    FOREIGN KEY (ID) REFERENCES TASK(ID) ON UPDATE CASCADE ON DELETE CASCADE);";

	if ($conn2->multi_query($sql) === FALSE) 
	{
		echo "Error Inserting: " . $sql . "<br>" . $conn2->error;
	} 

	$conn2->close();

?>