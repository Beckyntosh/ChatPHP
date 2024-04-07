CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS coupons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
coupon_code VARCHAR(30) NOT NULL,
user_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email) VALUES ('JohnDoe', 'johndoe@example.com');
INSERT INTO users (username, email) VALUES ('JaneSmith', 'janesmith@example.com');
INSERT INTO users (username, email) VALUES ('AliceJones', 'alicejones@example.com');
INSERT INTO users (username, email) VALUES ('BobBrown', 'bobbrown@example.com');
INSERT INTO users (username, email) VALUES ('EmilyDavis', 'emilydavis@example.com');
INSERT INTO users (username, email) VALUES ('DavidWilson', 'davidwilson@example.com');
INSERT INTO users (username, email) VALUES ('SarahTaylor', 'arahtaylor@example.com');
INSERT INTO users (username, email) VALUES ('MichaelClark', 'michaelclark@example.com');
INSERT INTO users (username, email) VALUES ('LauraMoore', 'lauramoore@example.com');
INSERT INTO users (username, email) VALUES ('KevinLee', 'kevinlee@example.com');
