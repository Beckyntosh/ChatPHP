CREATE TABLE IF NOT EXISTS subscribers (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    date TIMESTAMP
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
