CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verification_code VARCHAR(50),
is_verified TINYINT(1) DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, verification_code) VALUES ('JohnDoe', 'johndoe@example.com', 'password123', 'abc123');
INSERT INTO users (username, email, password, verification_code) VALUES ('JaneSmith', 'janesmith@example.com', 'securePW', 'def456');
INSERT INTO users (username, email, password, verification_code) VALUES ('AliceWong', 'alicewong@example.com', 'pass1234', 'ghi789');
INSERT INTO users (username, email, password, verification_code) VALUES ('BobJohnson', 'bjohnson@example.com', 'password456', 'jkl012');
INSERT INTO users (username, email, password, verification_code) VALUES ('SarahBrown', 'sbrown@example.com', 'myPass123', 'mno345');
INSERT INTO users (username, email, password, verification_code) VALUES ('MichaelLee', 'mlee@example.com', 'mypassword', 'pqr678');
INSERT INTO users (username, email, password, verification_code) VALUES ('EmilyMiller', 'emiller@example.com', 'abc@123', 'stu901');
INSERT INTO users (username, email, password, verification_code) VALUES ('DavidWilson', 'dwilson@example.com', 'securePW!', 'vwx234');
INSERT INTO users (username, email, password, verification_code) VALUES ('GraceLopez', 'glopez@example.com', 'mypassword456', 'yz@567');
INSERT INTO users (username, email, password, verification_code) VALUES ('RobertClark', 'rclark@example.com', 'hello123', 'ab789c');