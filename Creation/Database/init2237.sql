CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
coupon_code VARCHAR(50) NOT NULL
);

INSERT INTO users (username, email, coupon_code) VALUES ('JohnDoe', 'johndoe@example.com', 'ABC123');
INSERT INTO users (username, email, coupon_code) VALUES ('JaneSmith', 'janesmith@example.com', 'DEF456');
INSERT INTO users (username, email, coupon_code) VALUES ('AliceBrown', 'alicebrown@example.com', 'GHI789');
INSERT INTO users (username, email, coupon_code) VALUES ('BobJohnson', 'bjohnson@example.com', 'JKL012');
INSERT INTO users (username, email, coupon_code) VALUES ('EveWhite', 'evewhite@example.com', 'MNO345');
INSERT INTO users (username, email, coupon_code) VALUES ('SamGreen', 'samgreen@example.com', 'PQR678');
INSERT INTO users (username, email, coupon_code) VALUES ('SarahTaylor', 'sarahtaylor@example.com', 'STU901');
INSERT INTO users (username, email, coupon_code) VALUES ('MikeDavis', 'mikedavis@example.com', 'VWX234');
INSERT INTO users (username, email, coupon_code) VALUES ('EmilyClark', 'emilyclark@example.com', 'YZA567');
INSERT INTO users (username, email, coupon_code) VALUES ('AlexBrown', 'alexbrown@example.com', 'BCD890');
