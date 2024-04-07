CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS loyalty_program (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    points INT(6) DEFAULT 0,
    status ENUM('active', 'inactive') DEFAULT 'active',
    reg_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john@example.com', 'password123'),
                                                     ('jane_smith', 'jane@example.com', 'pass123word'),
                                                     ('sam_jones', 'sam@example.com', 'pwd456word'),
                                                     ('amy_davis', 'amy@example.com', 'abc789xyz'),
                                                     ('mike_brown', 'mike@example.com', 'password1');

INSERT INTO loyalty_program (user_id, points, status) VALUES (1, 50, 'active'),
                                                            (2, 30, 'active'),
                                                            (3, 10, 'active'),
                                                            (4, 20, 'active'),
                                                            (5, 40, 'active');