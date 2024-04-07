CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

CREATE TABLE IF NOT EXISTS coupons (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    coupon_code VARCHAR(15) NOT NULL,
    is_used BOOLEAN DEFAULT false,
    FOREIGN KEY (user_id) REFERENCES users(id)
    );

INSERT INTO users (email, password) VALUES ('user1@example.com', 'hashedpassword1');
INSERT INTO users (email, password) VALUES ('user2@example.com', 'hashedpassword2');
INSERT INTO users (email, password) VALUES ('user3@example.com', 'hashedpassword3');
INSERT INTO users (email, password) VALUES ('user4@example.com', 'hashedpassword4');
INSERT INTO users (email, password) VALUES ('user5@example.com', 'hashedpassword5');
INSERT INTO users (email, password) VALUES ('user6@example.com', 'hashedpassword6');
INSERT INTO users (email, password) VALUES ('user7@example.com', 'hashedpassword7');
INSERT INTO users (email, password) VALUES ('user8@example.com', 'hashedpassword8');
INSERT INTO users (email, password) VALUES ('user9@example.com', 'hashedpassword9');
INSERT INTO users (email, password) VALUES ('user10@example.com', 'hashedpassword10');

INSERT INTO coupons (user_id, coupon_code) VALUES (1, 'WELCOME1234');
INSERT INTO coupons (user_id, coupon_code) VALUES (2, 'WELCOME2345');
INSERT INTO coupons (user_id, coupon_code) VALUES (3, 'WELCOME3456');
INSERT INTO coupons (user_id, coupon_code) VALUES (4, 'WELCOME4567');
INSERT INTO coupons (user_id, coupon_code) VALUES (5, 'WELCOME5678');
INSERT INTO coupons (user_id, coupon_code) VALUES (6, 'WELCOME6789');
INSERT INTO coupons (user_id, coupon_code) VALUES (7, 'WELCOME7890');
INSERT INTO coupons (user_id, coupon_code) VALUES (8, 'WELCOME8901');
INSERT INTO coupons (user_id, coupon_code) VALUES (9, 'WELCOME9012');
INSERT INTO coupons (user_id, coupon_code) VALUES (10, 'WELCOME0123');
