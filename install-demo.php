<?php
require './__autoload.php';
use geunadamiano\usm\config\local\AppConfig;
use geunadamiano\usm\model\DB;

$conn = DB::serverConnectionWithoutDatabase();
$dbname = AppConfig::DB_NAME;

$sql1 = "DROP DATABASE if exists $dbname;
        CREATE database if not exists $dbname; 
        use $dbname;
        
        CREATE table if not exists User (
            userId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            firstName varchar(255) NOT NULL,
            lastName varchar(255)  NOT NULL,
            email varchar(255) NOT NULL,
            birthday DATE,
            password varchar(255) NOT NULL,
            CONSTRAINT User UNIQUE (email)
        )";

$conn->exec($sql1);

$sqlToInsertUserQuery1 = "INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (1, 'Adamo', 'ROSSI', 'adamo.rossi@email.com', '2002-06-12','5f4dcc3b5aa765d61d8327deb882cf99');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (2, 'Mario', 'FERRARI', 'mario.ferrari@email.com', '2001-06-12','0d2004b1e26842944f8bd6f5c9369569');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (3, 'Luigi', 'RUSSO', 'luigi.russo@email.com', '2007-08-06','5a4d5215fa1fb5435e5322dbeb60dd3c');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (4, 'Achille', 'BIANCHI', 'achille.bianchi@email.com', '2006-03-14','773b3244a8d15ee98a8cb30177c6e6e0');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (5, 'Adriano', 'ROMANO', 'adriano.romano@email.com', '2005-01-16','5f4dcc3b5aa765d61d8327deb882cf99');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (6, 'Gianni', 'ROSSI', 'gianni.rossi@email.com', '2005-04-22','0d2004b1e26842944f8bd6f5c9369569');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (7, 'Giuliano', 'FERRARI', 'giuliano.ferrari@email.com', '2007-07-16','5a4d5215fa1fb5435e5322dbeb60dd3c');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (8, 'Giusto', 'RUSSO', 'giusto.russo@email.com', '2001-03-28','773b3244a8d15ee98a8cb30177c6e6e0');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (9, 'Livio', 'BIANCHI', 'livio.bianchi@email.com', '2003-01-19','5f4dcc3b5aa765d61d8327deb882cf99');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (10, 'Paolo', 'ROMANO', 'paolo.romano@email.com', '2001-09-28','0d2004b1e26842944f8bd6f5c9369569');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (11, 'Onorato', 'ROSSI', 'onorato.rossi@email.com', '2005-06-29','5a4d5215fa1fb5435e5322dbeb60dd3c');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (12, 'Silvio', 'FERRARI', 'silvio.ferrari@email.com', '2005-04-11','773b3244a8d15ee98a8cb30177c6e6e0');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (13, 'Tancredi', 'RUSSO', 'tancredi.russo@email.com', '2000-07-30','5f4dcc3b5aa765d61d8327deb882cf99');
                            INSERT INTO User (userId, firstName, lastName, email, birthday, password) VALUES (14, 'Valter', 'BIANCHI', 'valter.bianchi@email.com', '2000-06-10','0d2004b1e26842944f8bd6f5c9369569');";
                            


$conn->exec($sqlToInsertUserQuery1);

$sql2 = "use $dbname;
        CREATE table if not exists Interest (
            interestId int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            name varchar(255) NOT NULL
        )";

$conn->exec($sql2);


$sqlToInsertUserQuery2 = "INSERT INTO Interest (interestId, name) VALUES (1, 'Videogiochi');
                        INSERT INTO Interest (interestId, name) VALUES (2, 'Sport');
                        INSERT INTO Interest (interestId, name) VALUES (3, 'Libri');
                        INSERT INTO Interest (interestId, name) VALUES (4, 'Viaggio');
                        INSERT INTO Interest (interestId, name) VALUES (5, 'Cucina');";

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
