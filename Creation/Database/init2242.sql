CREATE TABLE IF NOT EXISTS subscribers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO subscribers (email) VALUES ('user1@example.com');
INSERT INTO subscribers (email) VALUES ('user2@example.com');
INSERT INTO subscribers (email) VALUES ('user3@example.com');
INSERT INTO subscribers (email) VALUES ('user4@example.com');
INSERT INTO subscribers (email) VALUES ('user5@example.com');
INSERT INTO subscribers (email) VALUES ('user6@example.com');
INSERT INTO subscribers (email) VALUES ('user7@example.com');
INSERT INTO subscribers (email) VALUES ('user8@example.com');
INSERT INTO subscribers (email) VALUES ('user9@example.com');
INSERT INTO subscribers (email) VALUES ('user10@example.com');
