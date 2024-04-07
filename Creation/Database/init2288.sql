CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified TINYINT NOT NULL DEFAULT 0,
    verification_code VARCHAR(255) NOT NULL
);

INSERT INTO users (name, email, email_verified, verification_code) VALUES
('John Doe', 'john.doe@example.com', 0, 'abc123'),
('Jane Smith', 'jane.smith@example.com', 0, 'def456'),
('Alice Johnson', 'alice.johnson@example.com', 0, 'ghi789'),
('Bob Brown', 'bob.brown@example.com', 0, 'jkl012'),
('Eva White', 'eva.white@example.com', 0, 'mno345'),
('Sam Wilson', 'sam.wilson@example.com', 0, 'pqr678'),
('Lily Davis', 'lily.davis@example.com', 0, 'stu901'),
('Tom Taylor', 'tom.taylor@example.com', 0, 'vwx234'),
('Sarah Miller', 'sarah.miller@example.com', 0, 'yz0123'),
('Chris Martin', 'chris.martin@example.com', 0, '456abc');
