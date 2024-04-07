CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS password_reset (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
email VARCHAR(50) NOT NULL,
token VARCHAR(255) NOT NULL,
expires_at DATETIME NOT NULL
);

INSERT INTO users (email, password, reg_date)
VALUES ('user1@example.com', 'password123', NOW()),
       ('user2@example.com', 'securepass', NOW()),
       ('user3@example.com', 'pass1234', NOW()),
       ('user4@example.com', 'changeme', NOW()),
       ('user5@example.com', 'qwertyuiop', NOW()),
       ('user6@example.com', '987654321', NOW()),
       ('user7@example.com', 'password321', NOW()),
       ('user8@example.com', 'newpass2021', NOW()),
       ('user9@example.com', 'letmein', NOW()),
       ('user10@example.com', 'p@ssw0rd', NOW());

INSERT INTO password_reset (email, token, expires_at)
VALUES ('user1@example.com', 'a1b2c3d4e5f6', NOW()),
       ('user2@example.com', 'sometoken1234', NOW()),
       ('user3@example.com', 'randomtoken5678', NOW()),
       ('user4@example.com', 'reset12345678', NOW()),
       ('user5@example.com', 'tokentest90123', NOW()),
       ('user6@example.com', 'securetoken456', NOW()),
       ('user7@example.com', 'passwordreset12', NOW()),
       ('user8@example.com', 'newpassword345', NOW()),
       ('user9@example.com', 'passtoken789', NOW()),
       ('user10@example.com', 'tokenpass456', NOW());
