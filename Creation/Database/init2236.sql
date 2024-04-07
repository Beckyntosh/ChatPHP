CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
coupon_code VARCHAR(50) NOT NULL
);

INSERT INTO users (firstname, email, coupon_code) VALUES ('John', 'john@example.com', 'COUPON1234');
INSERT INTO users (firstname, email, coupon_code) VALUES ('Alice', 'alice@example.com', 'COUPON2345');
INSERT INTO users (firstname, email, coupon_code) VALUES ('Bob', 'bob@example.com', 'COUPON3456');
INSERT INTO users (firstname, email, coupon_code) VALUES ('Emma', 'emma@example.com', 'COUPON4567');
INSERT INTO users (firstname, email, coupon_code) VALUES ('Michael', 'michael@example.com', 'COUPON5678');
INSERT INTO users (firstname, email, coupon_code) VALUES ('Sarah', 'sarah@example.com', 'COUPON6789');
INSERT INTO users (firstname, email, coupon_code) VALUES ('David', 'david@example.com', 'COUPON7890');
INSERT INTO users (firstname, email, coupon_code) VALUES ('Sophia', 'sophia@example.com', 'COUPON8901');
INSERT INTO users (firstname, email, coupon_code) VALUES ('James', 'james@example.com', 'COUPON9012');
INSERT INTO users (firstname, email, coupon_code) VALUES ('Olivia', 'olivia@example.com', 'COUPON0123');