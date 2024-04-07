CREATE TABLE IF NOT EXISTS subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(64) NOT NULL,
confirmed TINYINT(1) NOT NULL DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO subscribers (email, token) VALUES ('john.doe@example.com', '7f2be04a47873b1f443186d520068deb');
INSERT INTO subscribers (email, token) VALUES ('jane.smith@example.com', '421b55d81f67c0f1aa42e6bd3e88a175');
INSERT INTO subscribers (email, token) VALUES ('alice.jones@example.com', 'e786ebc250026ac9f18cdc666c0b8e46');
INSERT INTO subscribers (email, token) VALUES ('mike.brown@example.com', '5ae67c0ec5dfe371862f67979d60abb2');
INSERT INTO subscribers (email, token) VALUES ('sarah.wilson@example.com', '0b43b0434d82cb2d0809fa8860e18ea1');
INSERT INTO subscribers (email, token) VALUES ('kevin.jackson@example.com', 'c3b6c20847a21b51a4a5e04a0c7f96cb');
INSERT INTO subscribers (email, token) VALUES ('lisa.white@example.com', '08217a54e968c35f83563adac59107ac');
INSERT INTO subscribers (email, token) VALUES ('chris.miller@example.com', '2c8a83a0aee73124f127ed90fad1d350');
INSERT INTO subscribers (email, token) VALUES ('amanda.roberts@example.com', '3a69b5e72a76667e236d5c82d82c75b3');
INSERT INTO subscribers (email, token) VALUES ('ryan.garcia@example.com', 'f1e7ebe082bf13f8d651021d0f53d4bf');
