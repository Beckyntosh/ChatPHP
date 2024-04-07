CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Users (name, email) VALUES ('John Doe', 'johndoe@example.com');
INSERT INTO Users (name, email) VALUES ('Jane Smith', 'janesmith@example.com');
INSERT INTO Users (name, email) VALUES ('Michael Johnson', 'michaeljohnson@example.com');
INSERT INTO Users (name, email) VALUES ('Emily Brown', 'emilybrown@example.com');
INSERT INTO Users (name, email) VALUES ('Daniel Wilson', 'danielwilson@example.com');
INSERT INTO Users (name, email) VALUES ('Sarah Lee', 'sarahlee@example.com');
INSERT INTO Users (name, email) VALUES ('Chris Taylor', 'christaylor@example.com');
INSERT INTO Users (name, email) VALUES ('Amanda Martinez', 'amandamartinez@example.com');
INSERT INTO Users (name, email) VALUES ('Robert Garcia', 'robertgarcia@example.com');
INSERT INTO Users (name, email) VALUES ('Michelle Rodriguez', 'michellerodriguez@example.com');