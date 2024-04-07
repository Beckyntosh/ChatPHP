CREATE TABLE IF NOT EXISTS account_recovery_steps (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    step INT NOT NULL,
    code VARCHAR(6) NOT NULL
);

INSERT INTO account_recovery_steps (email, step, code) VALUES 
('test1@example.com', 1, 'ABC123'),
('test1@example.com', 2, 'DEF456'),
('test2@example.com', 1, 'GHI789'),
('test2@example.com', 2, 'JKL012'),
('test3@example.com', 1, 'MNO345'),
('test3@example.com', 2, 'PQR678'),
('test4@example.com', 1, 'STU901'),
('test4@example.com', 2, 'VWX234'),
('test5@example.com', 1, 'YZA567'),
('test5@example.com', 2, 'BCD890');
