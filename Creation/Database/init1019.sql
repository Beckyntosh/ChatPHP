CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

-- Insert values into users table
INSERT INTO users (username, password) VALUES ('john_doe', '$2y$10$ZoqHI5Q7tnAm08U0HNM7SOtOUIOHnbDNliybsLIf8RwDywCtMvIaW'),
('alice_smith', '$2y$10$lv2Tj0iouRyBnAVbYnrj.u6L5LWadE5WRpsD01FIigYCftJTq5vPu'),
('ryan_miller', '$2y$10$J.d/UR8N4NXI78LXVYoUu.wVGToH5Sju.oC5b3lrzMQg3fPvHvNDS'),
('sara_wong', '$2y$10$Fh0oHMyoZUg47ooWV36uTODcA7w2ZV/Eyzwi4U0m8Qju2zMnMdJI6'),
('adam_clark', '$2y$10$73cqk/MlenNJwDQfYzs53uG0l2wFcmpir9ixFdSP5CTICw2IU5FZG'),
('emily_brown', '$2y$10$WppmZF.Fg7kyjnZ9FNpKmOWscuStCtjWnlHjbsL395cc.TS4dMMAG'),
('michael_nguyen', '$2y$10$VSj0OBABnoGOOj0BvdD38.obB0Y/oL6HOCQ8/TIzsxqfYOKE/a9W2'),
('lisa_lee', '$2y$10$Gqsx8tGw6WYIxqst6Wb0LO3wyURRjR8S06VuldlT3ou09BKsTK2B6'),
('kevin_kim', '$2y$10$S6am5Bmz4jQ1wzS4npu2auwG3cmiBof0x4XV/JXOuFQ34vHPL1O1C'),
('jessica_smith', '$2y$10$ybC8N/nvOs4c3DMSTMzzmeTB9F8usXqpMb/n/8crlKQ4.8I3fED9u');
