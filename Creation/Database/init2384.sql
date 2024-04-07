CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
courseName VARCHAR(50) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Users (firstname, lastname, email, password) VALUES ('John', 'Doe', 'johndoe@example.com', 'password123');
INSERT INTO Users (firstname, lastname, email, password) VALUES ('Alice', 'Smith', 'alicesmith@example.com', 'securepass');
INSERT INTO Users (firstname, lastname, email, password) VALUES ('Bob', 'Brown', 'bobbrown@example.com', 'letmein');
INSERT INTO Users (firstname, lastname, email, password) VALUES ('Sarah', 'Johnson', 'sarahj@example.com', 'p@ssw0rd');
INSERT INTO Users (firstname, lastname, email, password) VALUES ('Mike', 'Williams', 'mikew@example.com', 'abc123');
INSERT INTO Users (firstname, lastname, email, password) VALUES ('Emily', 'Davis', 'emilyd@example.com', 'qwerty');
INSERT INTO Users (firstname, lastname, email, password) VALUES ('Chris', 'Anderson', 'chrisa@example.com', 'pass1234');
INSERT INTO Users (firstname, lastname, email, password) VALUES ('Emma', 'Martinez', 'emmartinez@example.com', '987654');
INSERT INTO Users (firstname, lastname, email, password) VALUES ('Daniel', 'Garcia', 'danielg@example.com', 'thepassword');
INSERT INTO Users (firstname, lastname, email, password) VALUES ('Laura', 'Rodriguez', 'laurar@example.com', 'hello123');
