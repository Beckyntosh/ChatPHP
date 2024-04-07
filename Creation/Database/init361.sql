CREATE TABLE IF NOT EXISTS subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(32) NOT NULL,
confirmed TINYINT(1) NOT NULL DEFAULT 0,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO subscribers (email, token, confirmed) VALUES ('john@example.com', '123456', 1);
INSERT INTO subscribers (email, token, confirmed) VALUES ('jane@example.com', '789012', 0);
INSERT INTO subscribers (email, token, confirmed) VALUES ('alex@example.com', '345678', 0);
INSERT INTO subscribers (email, token, confirmed) VALUES ('lucy@example.com', '901234', 1);
INSERT INTO subscribers (email, token, confirmed) VALUES ('mark@example.com', '567890', 1);
INSERT INTO subscribers (email, token, confirmed) VALUES ('sara@example.com', '234567', 0);
INSERT INTO subscribers (email, token, confirmed) VALUES ('tom@example.com', '890123', 1);
INSERT INTO subscribers (email, token, confirmed) VALUES ('emily@example.com', '456789', 0);
INSERT INTO subscribers (email, token, confirmed) VALUES ('mike@example.com', '012345', 1);
INSERT INTO subscribers (email, token, confirmed) VALUES ('lisa@example.com', '678901', 0);