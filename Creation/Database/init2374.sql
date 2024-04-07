CREATE TABLE IF NOT EXISTS forum_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    favorite_child_clothing_brand VARCHAR(50),
    join_date TIMESTAMP
);

INSERT INTO forum_users (username, email, password, favorite_child_clothing_brand, join_date) VALUES
('user1', 'user1@example.com', '$2y$10$3FtVPf7yYVVwtvCJV9XTrOjxXbO5YVoIEAsHcEJ9LUPumR5E5QhUy', 'Brand1', NOW()),
('user2', 'user2@example.com', '$2y$10$o1LPHUU72sT5UGJdzB/BCOfL8z/SPYp8vBcUHeWfKNTbvR36r1TLi', 'Brand2', NOW()),
('user3', 'user3@example.com', '$2y$10$Cir1Q87UEdDE81SM0FXP4.UXeva1G4nYSH7/xxNyjcrQQDpOk5W1u', 'Brand3', NOW()),
('user4', 'user4@example.com', '$2y$10$QZ5a4/Esc7utlWpbBgTOieZmsQ795rjWbJnuTzRQ8WCm0b4xyzAkW', 'Brand4', NOW()),
('user5', 'user5@example.com', '$2y$10$c73smk14qTdZK2xKQTnX8e/VzOc/k9wkTavT9eLZnx88QWv.e12J2', 'Brand5', NOW()),
('user6', 'user6@example.com', '$2y$10$L0tZooalqX3o4nvnWXKO0e9wIg0IqIFp6j/PwhaHwwo884xe1yrby', 'Brand6', NOW()),
('user7', 'user7@example.com', '$2y$10$FbTtRy7ZIo8IDp.XRNILku.l3E6pljnJy7mp9SOzvXxh4uSRhrd92', 'Brand7', NOW()),
('user8', 'user8@example.com', '$2y$10$2pII74XcFBKt7bQQtPAOBuyyEBbChdBYCRbZdEx5gEIRqQvIX3if2', 'Brand8', NOW()),
('user9', 'user9@example.com', '$2y$10$kyt2Y9Rr4hpmQbQ.7/lkN.3mUOSKVWvQD.Z.ciIz5Pg0E3yj4U3Me', 'Brand9', NOW()),
('user10', 'user10@example.com', '$2y$10$cGqGjkB5TvNXqKr6wa14I.YwDYwGppUWliWrMxmlQFJt3fK1Tar4m', 'Brand10', NOW());