<?php
require './__autoload.php';
use geunadamiano\usm\config\local\AppConfig;
use geunadamiano\usm\model\DB;

$conn = DB::serverConnectionWithoutDatabase();
$dbname = AppConfig::DB_NAME;

$sql1 = "DROP DATABASE if exists $dbname;
        CREATE database if not exists $dbname; 
        use $dbname;

        CREATE TABLE `user` (
            `userId` INT(10) NOT NULL AUTO_INCREMENT,
            `firstName` VARCHAR(255) NOT NULL,
            `lastName` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `birthday` DATE NULL DEFAULT NULL,
            `password` VARCHAR(50) NOT NULL,
            PRIMARY KEY (`userId`),
            UNIQUE INDEX `email` (`email`)
        )";

$conn->exec($sql1);

$sqlToInsertUserQuery1 = "INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (1, 'Adamo', 'ROSSI', 'adamo.rossi@email.com', '2002-06-12', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (2, 'Mario', 'FERRARI', 'mario.ferrari@email.com', '2001-06-12', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (3, 'Luigi', 'RUSSO', 'luigi.russo@email.com', '2007-08-06', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (4, 'Achille', 'BIANCHI', 'achille.bianchi@email.com', '2006-03-14', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (5, 'Adriano', 'ROMANO', 'adriano.romano@email.com', '2005-01-16', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (6, 'Gianni', 'ROSSI', 'gianni.rossi@email.com', '2005-04-22', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (7, 'Giuliano', 'FERRARI', 'giuliano.ferrari@email.com', '2007-07-16', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (8, 'Giusto', 'RUSSO', 'giusto.russo@email.com', '2001-03-28', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (9, 'Livio', 'BIANCHI', 'livio.bianchi@email.com', '2003-01-19', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (10, 'Paolo', 'ROMANO', 'paolo.romano@email.com', '2001-09-28', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (11, 'Onorato', 'ROSSI', 'onorato.rossi@email.com', '2005-06-29', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (12, 'Silvio', 'FERRARI', 'silvio.ferrari@email.com', '2005-04-11', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (13, 'Tancredi', 'RUSSO', 'tancredi.russo@email.com', '2000-07-30', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (14, 'Valter', 'BIANCHI', 'valter.bianchi@email.com', '2000-06-10', 'qwerty');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (15, 'Zeno', 'ROMANO', 'zeno.romano@email.com', '2001-07-21', 'qwerty');"; 


$conn->exec($sqlToInsertUserQuery1);

$sql2 = "use $dbname;
        CREATE table if not exists Interest (
            interestId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            name varchar(255) NOT NULL
        )";

$conn->exec($sql2);

$sqlToInsertUserQuery2 = "INSERT INTO Interest (interestId, name) VALUES (1, 'DISEGNO');
                        INSERT INTO Interest (interestId, name) VALUES (2, 'FOTOGRAFIA');
                        INSERT INTO Interest (interestId, name) VALUES (3, 'SPORT');
                        INSERT INTO Interest (interestId, name) VALUES (4, 'VIAGGIO');
                        INSERT INTO Interest (interestId, name) VALUES (5, 'VIDEOGIOCHI' );";

$conn->exec($sqlToInsertUserQuery2);

$sql3 = "use $dbname;
        CREATE table if not exists User_Interest (
            userId int(10) NOT NULL,
            interestId int(10) NOT NULL,
            FOREIGN KEY (userId) REFERENCES User(userId),
            FOREIGN KEY (interestId) REFERENCES Interest(interestId),
            CONSTRAINT User_Interest UNIQUE (userId,interestId)
        )";


$conn->exec($sql3);

