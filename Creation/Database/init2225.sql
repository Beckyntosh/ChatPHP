CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS coupons (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    code VARCHAR(10) NOT NULL,
    is_used BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (email, password) VALUES ('john@example.com', 'password123');
INSERT INTO users (email, password) VALUES ('emma@example.com', 'pass321word');
INSERT INTO users (email, password) VALUES ('mike@example.com', 'securepwd');
INSERT INTO users (email, password) VALUES ('sara@example.com', 'saraPass321');
INSERT INTO users (email, password) VALUES ('chris@example.com', 'chrispass123');
INSERT INTO users (email, password) VALUES ('lisa@example.com', 'lisaSecure');
INSERT INTO users (email, password) VALUES ('alex@example.com', 'alex123pass');
INSERT INTO users (email, password) VALUES ('julia@example.com', 'juliapassword');
INSERT INTO users (email, password) VALUES ('mark@example.com', 'marksecure1');
INSERT INTO users (email, password) VALUES ('lucy@example.com', 'lucypass321');

INSERT INTO coupons (user_id, code) VALUES (1, 'ABC123');
INSERT INTO coupons (user_id, code) VALUES (2, 'DEF456');
INSERT INTO coupons (user_id, code) VALUES (3, 'GHI789');
INSERT INTO coupons (user_id, code) VALUES (4, 'JKL012');
INSERT INTO coupons (user_id, code) VALUES (5, 'MNO345');
INSERT INTO coupons (user_id, code) VALUES (6, 'PQR678');
INSERT INTO coupons (user_id, code) VALUES (7, 'STU901');
INSERT INTO coupons (user_id, code) VALUES (8, 'VWX234');
INSERT INTO coupons (user_id, code) VALUES (9, 'YZA567');
INSERT INTO coupons (user_id, code) VALUES (10, 'BCD890');
