CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO Users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO Users (name, email) VALUES ('Michael Johnson', 'michael.johnson@example.com');
INSERT INTO Users (name, email) VALUES ('Sarah Wilson', 'sarah.wilson@example.com');
INSERT INTO Users (name, email) VALUES ('Chris Brown', 'chris.brown@example.com');
INSERT INTO Users (name, email) VALUES ('Emily Davis', 'emily.davis@example.com');
INSERT INTO Users (name, email) VALUES ('Matthew Taylor', 'matthew.taylor@example.com');
INSERT INTO Users (name, email) VALUES ('Olivia Clark', 'olivia.clark@example.com');
INSERT INTO Users (name, email) VALUES ('Daniel Martinez', 'daniel.martinez@example.com');
INSERT INTO Users (name, email) VALUES ('Ava Rodriguez', 'ava.rodriguez@example.com');