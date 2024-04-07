CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    subscription_status BOOLEAN DEFAULT FALSE,
    trial_end_date DATE NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS subscriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email, subscription_status, trial_end_date) VALUES 
('john_doe', 'john.doe@example.com', FALSE, '2023-11-25'),
('jane_smith', 'jane.smith@example.com', FALSE, '2023-12-15'),
('sam_wilson', 'sam.wilson@example.com', FALSE, '2023-12-20'),
('emily_jones', 'emily.jones@example.com', FALSE, '2023-11-30'),
('alex_brown', 'alex.brown@example.com', FALSE, '2023-12-10'),
('lisa_walker', 'lisa.walker@example.com', FALSE, '2023-12-05'),
('mike_harris', 'mike.harris@example.com', FALSE, '2023-12-25'),
('sara_clark', 'sara.clark@example.com', FALSE, '2023-11-28'),
('kevin_miller', 'kevin.miller@example.com', FALSE, '2023-12-03'),
('natalie_carter', 'natalie.carter@example.com', FALSE, '2023-12-30');
