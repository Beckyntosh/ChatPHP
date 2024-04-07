CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
skinType ENUM('dry', 'oily', 'combination', 'sensitive', 'normal') DEFAULT 'normal',
preferences TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES ('John', 'Doe', 'johndoe@example.com', 'dry', '[\"moisturizer\",\"cleanser\"]');
INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES ('Alice', 'Smith', 'alicesmith@example.com', 'oily', '[\"cleanser\",\"sunscreen\"]');
INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES ('Bob', 'Johnson', 'bjohnson@example.com', 'normal', '[\"moisturizer\",\"sunscreen\"]');
INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES ('Emily', 'Brown', 'emilybrown@example.com', 'combination', '[\"cleanser\",\"sunscreen\"]');
INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES ('Michael', 'Davis', 'mdavis@example.com', 'sensitive', '[\"moisturizer\"]');
INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES ('Sarah', 'Wilson', 'sarahwilson@example.com', 'oily', '[\"sunscreen\"]');
INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES ('Ryan', 'Martinez', 'rmartinez@example.com', 'dry', '[\"moisturizer\",\"sunscreen\"]');
INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES ('Emma', 'Thompson', 'ethompson@example.com', 'combination', '[\"cleanser\"]');
INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES ('Kevin', 'Adams', 'kadams@example.com', 'normal', '[\"moisturizer\",\"cleanser\",\"sunscreen\"]');
INSERT INTO Users (firstname, lastname, email, skinType, preferences) VALUES ('Jessica', 'Garcia', 'jgarcia@example.com', 'sensitive', '[\"sunscreen\"]');
