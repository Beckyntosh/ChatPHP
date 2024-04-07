CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
preferences VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO Users (username, email, preferences) VALUES ('user1', 'user1@example.com', 'trends,tips');
INSERT INTO Users (username, email, preferences) VALUES ('user2', 'user2@example.com', 'products,diy');
INSERT INTO Users (username, email, preferences) VALUES ('user3', 'user3@example.com', 'trends,tips,products');
INSERT INTO Users (username, email, preferences) VALUES ('user4', 'user4@example.com', 'tips,diy');
INSERT INTO Users (username, email, preferences) VALUES ('user5', 'user5@example.com', 'trends,products');
INSERT INTO Users (username, email, preferences) VALUES ('user6', 'user6@example.com', 'diy');
INSERT INTO Users (username, email, preferences) VALUES ('user7', 'user7@example.com', 'trends');
INSERT INTO Users (username, email, preferences) VALUES ('user8', 'user8@example.com', 'tips');
INSERT INTO Users (username, email, preferences) VALUES ('user9', 'user9@example.com', 'products');
INSERT INTO Users (username, email, preferences) VALUES ('user10', 'user10@example.com', 'trends,diy');
