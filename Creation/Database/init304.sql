CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
verification_code VARCHAR(50),
verified TINYINT(1) DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, verification_code) VALUES ('john_doe', 'john.doe@example.com', 'password123', 'abc123');
INSERT INTO users (username, email, password, verification_code) VALUES ('jane_smith', 'jane.smith@example.com', 'pass321', 'xyz789');
INSERT INTO users (username, email, password, verification_code) VALUES ('test_user', 'test.user@example.com', 'test456', '123abc');
INSERT INTO users (username, email, password, verification_code) VALUES ('alice_green', 'alice.green@example.com', 'green876', 'def456');
INSERT INTO users (username, email, password, verification_code) VALUES ('bob_gray', 'bob.gray@example.com', 'gray765', '234bcd');
INSERT INTO users (username, email, password, verification_code) VALUES ('sara_black', 'sara.black@example.com', 'black987', 'bcd345');
INSERT INTO users (username, email, password, verification_code) VALUES ('mark_white', 'mark.white@example.com', 'white234', 'yzx987');
INSERT INTO users (username, email, password, verification_code) VALUES ('linda_brown', 'linda.brown@example.com', 'brown876', 'fgh456');
INSERT INTO users (username, email, password, verification_code) VALUES ('kevin_miller', 'kevin.miller@example.com', 'miller789', 'rty567');
INSERT INTO users (username, email, password, verification_code) VALUES ('amy_taylor', 'amy.taylor@example.com', 'taylor543', 'wqz678');