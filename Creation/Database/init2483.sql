CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    date DATE,
    time TIME,
    destination VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (name, email, password) VALUES ('John Doe', 'john.doe@example.com', 'password123'),
('Jane Smith', 'jane.smith@example.com', 'securepwd'),
('Alice Johnson', 'alice.johnson@example.com', 'p@ssw0rd');

INSERT INTO appointments (user_id, date, time, destination) VALUES (1, '2022-10-15', '09:30:00', 'Paris'),
(2, '2022-11-20', '11:00:00', 'Tokyo'),
(3, '2022-12-05', '15:45:00', 'New York');
