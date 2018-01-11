CREATE DATABASE TODO_APP;
CREATE USER 'TODOUSER'@'localhost' IDENTIFIED BY '123user';
GRANT ALL PRIVILEGES ON TODO_APP.* TO 'TODOUSER'@'localhost';

CREATE TABLE TODO_APP.STATUS (
	STATUS VARCHAR(25),
	PRIMARY KEY(STATUS)
);
INSERT INTO TODO_APP.STATUS (STATUS) VALUES('STARTED');
INSERT INTO TODO_APP.STATUS (STATUS) VALUES('PENDING');
INSERT INTO TODO_APP.STATUS (STATUS) VALUES('COMPLETED');
INSERT INTO TODO_APP.STATUS (STATUS) VALUES('LATE');

CREATE TABLE TODO_APP.TASK (
     ID INTEGER NOT NULL AUTO_INCREMENT,
     TASK_NAME VARCHAR(30) NOT NULL,
     STATUS VARCHAR(25),
     PRIMARY KEY (ID),
     FOREIGN KEY (STATUS) references STATUS(STATUS) ON UPDATE CASCADE
 );