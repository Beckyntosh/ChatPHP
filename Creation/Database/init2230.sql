
CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS coupons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
coupon_code VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (email, password) VALUES ('user1@example.com', 'password1');
INSERT INTO users (email, password) VALUES ('user2@example.com', 'password2');
INSERT INTO users (email, password) VALUES ('user3@example.com', 'password3');
INSERT INTO users (email, password) VALUES ('user4@example.com', 'password4');
INSERT INTO users (email, password) VALUES ('user5@example.com', 'password5');
INSERT INTO users (email, password) VALUES ('user6@example.com', 'password6');
INSERT INTO users (email, password) VALUES ('user7@example.com', 'password7');
INSERT INTO users (email, password) VALUES ('user8@example.com', 'password8');
INSERT INTO users (email, password) VALUES ('user9@example.com', 'password9');
INSERT INTO users (email, password) VALUES ('user10@example.com', 'password10');