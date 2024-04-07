CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verification_code VARCHAR(50),
is_verified TINYINT(1) NOT NULL DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, verification_code) VALUES
('john_doe', 'john.doe@example.com', 'password1', 'verification_code1'),
('jane_smith', 'jane.smith@example.com', 'password2', 'verification_code2'),
('alice_wonderland', 'alice.wonderland@example.com', 'password3', 'verification_code3'),
('bob_marley', 'bob.marley@example.com', 'password4', 'verification_code4'),
('sarah_connor', 'sarah.connor@example.com', 'password5', 'verification_code5'),
('michael_scott', 'michael.scott@example.com', 'password6', 'verification_code6'),
('eleven_stranger', 'eleven.stranger@example.com', 'password7', 'verification_code7'),
('bruce_wayne', 'bruce.wayne@example.com', 'password8', 'verification_code8'),
('tony_stark', 'tony.stark@example.com', 'password9', 'verification_code9'),
('harry_potter', 'harry.potter@example.com', 'password10', 'verification_code10');