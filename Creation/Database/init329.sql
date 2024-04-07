CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    facebook_id VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO users (email, facebook_id) VALUES ('john@example.com', '123456');
INSERT INTO users (email, facebook_id) VALUES ('jane@example.com', '789012');
INSERT INTO users (email, facebook_id) VALUES ('alex@example.com', '345678');
INSERT INTO users (email, facebook_id) VALUES ('sara@example.com', '901234');
INSERT INTO users (email, facebook_id) VALUES ('mike@example.com', '567890');
INSERT INTO users (email, facebook_id) VALUES ('lisa@example.com', '123789');
INSERT INTO users (email, facebook_id) VALUES ('ryan@example.com', '890123');
INSERT INTO users (email, facebook_id) VALUES ('emily@example.com', '678901');
INSERT INTO users (email, facebook_id) VALUES ('adam@example.com', '234567');
INSERT INTO users (email, facebook_id) VALUES ('sophia@example.com', '456789');