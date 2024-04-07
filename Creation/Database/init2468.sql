CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    password TEXT
);

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    date DATE
);

INSERT INTO users (name, email, password) VALUES 
("John Doe", "johndoe@example.com", "password123"),
("Jane Smith", "janesmith@example.com", "abcde456"),
("Michael Johnson", "michaeljohnson@example.com", "passw@rd!"),
("Emily Brown", "emilybrown@example.com", "securePW789"),
("David Lee", "davidlee@example.com", "strongPass!23");

INSERT INTO appointments (userId, date) VALUES 
(1, '2022-04-15'),
(2, '2022-04-20'),
(3, '2022-04-25'),
(4, '2022-05-01'),
(5, '2022-05-05');