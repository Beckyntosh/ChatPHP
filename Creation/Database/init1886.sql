CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

-- Create preferences table
CREATE TABLE IF NOT EXISTS preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userId INT(6) UNSIGNED,
    preference VARCHAR(50),
    FOREIGN KEY(userId) REFERENCES users(id)
);

-- Insert sample data into users table
INSERT INTO users (firstname, lastname, email, password) VALUES
("Alice", "Smith", "alice@example.com", "password123"),
("Bob", "Johnson", "bob@example.com", "securepass"),
("Charlie", "Brown", "charlie@example.com", "mysecretpass"),
("David", "Lee", "david@example.com", "testpassword"),
("Emma", "Davis", "emma@example.com", "password123");

-- Insert sample data into preferences table
INSERT INTO preferences (userId, preference) VALUES
(1, "Gold"),
(1, "Silver"),
(2, "Diamond"),
(3, "Gold"),
(3, "Diamond"),
(4, "Silver"),
(5, "Gold"),
(5, "Diamond"),
(5, "Silver"),
(5, "Gold");
