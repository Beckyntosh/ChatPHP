CREATE TABLE subscriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    subscription_start DATE NOT NULL,
    subscription_end DATE NOT NULL,
    status VARCHAR(10) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO subscriptions (email, subscription_start, subscription_end, status) VALUES 
('user1@example.com', '2023-07-15', '2023-08-15', 'active'),
('user2@example.com', '2023-07-16', '2023-08-16', 'active'),
('user3@example.com', '2023-07-17', '2023-08-17', 'active'),
('user4@example.com', '2023-07-18', '2023-08-18', 'active'),
('user5@example.com', '2023-07-19', '2023-08-19', 'active'),
('user6@example.com', '2023-07-20', '2023-08-20', 'active'),
('user7@example.com', '2023-07-21', '2023-08-21', 'active'),
('user8@example.com', '2023-07-22', '2023-08-22', 'active'),
('user9@example.com', '2023-07-23', '2023-08-23', 'active'),
('user10@example.com', '2023-07-24', '2023-08-24', 'active');
