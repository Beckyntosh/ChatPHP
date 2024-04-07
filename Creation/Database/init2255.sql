CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO subscribers (email) VALUES ('john@example.com');
INSERT INTO subscribers (email) VALUES ('sarah@example.com');
INSERT INTO subscribers (email) VALUES ('michael@example.com');
INSERT INTO subscribers (email) VALUES ('lisa@example.com');
INSERT INTO subscribers (email) VALUES ('robert@example.com');
INSERT INTO subscribers (email) VALUES ('emily@example.com');
INSERT INTO subscribers (email) VALUES ('david@example.com');
INSERT INTO subscribers (email) VALUES ('amy@example.com');
INSERT INTO subscribers (email) VALUES ('brian@example.com');
INSERT INTO subscribers (email) VALUES ('jessica@example.com');
