CREATE TABLE users (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   firstname VARCHAR(30) NOT NULL,
   lastname VARCHAR(30) NOT NULL,
   email VARCHAR(50),
   reg_date TIMESTAMP
);

CREATE TABLE research_data (
   id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   user_id INT(6) UNSIGNED,
   data TEXT,
   data_date TIMESTAMP,
   FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (firstname, lastname, email, reg_date) VALUES 
("John", "Doe", "johndoe@example.com", NOW()),
("Alice", "Smith", "alicesmith@example.com", NOW()),
("Bob", "Johnson", "bjohnson@example.com", NOW()),
("Emily", "Brown", "ebrown@example.com", NOW()),
("David", "Lee", "davidlee@example.com", NOW()),
("Sarah", "Wilson", "swilson@example.com", NOW()),
("Michael", "Clark", "mclark@example.com", NOW()),
("Emma", "Martinez", "emartinez@example.com", NOW()),
("Daniel", "Taylor", "dtaylor@example.com", NOW()),
("Olivia", "Garcia", "ogarcia@example.com", NOW());

INSERT INTO research_data (user_id, data, data_date) VALUES 
(1, "Research Data 1", NOW()),
(2, "Research Data 2", NOW()),
(3, "Research Data 3", NOW()),
(4, "Research Data 4", NOW()),
(5, "Research Data 5", NOW()),
(6, "Research Data 6", NOW()),
(7, "Research Data 7", NOW()),
(8, "Research Data 8", NOW()),
(9, "Research Data 9", NOW()),
(10, "Research Data 10", NOW());