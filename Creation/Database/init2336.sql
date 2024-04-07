CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS registrations (
    reg_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    event_name VARCHAR(50) NOT NULL,
    registration_date TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (fullname, email, password) VALUES ('John Doe', 'john.doe@example.com', 'password123'),
('Jane Smith', 'jane.smith@example.com', 'securepwd'),
('Alice Johnson', 'alice.johnson@example.com', 'p@ssw0rd'),
('Bob Brown', 'bob.brown@example.com', 'letmein'),
('Ella Davis', 'ella.davis@example.com', '123456'),
('Mike Wilson', 'mike.wilson@example.com', 'abc123'),
('Sarah Martinez', 'sarah.martinez@example.com', 'pass123'),
('David Thompson', 'david.thompson@example.com', 'qwerty'),
('Olivia White', 'olivia.white@example.com', 'password1'),
('James Lee', 'james.lee@example.com', 'securepass');
