CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
coupon_code VARCHAR(10),
reg_date TIMESTAMP
);

INSERT INTO users (name, email, coupon_code) VALUES ('Alice', 'alice@example.com', 'ABCD1234');
INSERT INTO users (name, email, coupon_code) VALUES ('Bob', 'bob@example.com', 'WXYZ5678');
INSERT INTO users (name, email, coupon_code) VALUES ('Charlie', 'charlie@example.com', 'EFGH9012');
INSERT INTO users (name, email, coupon_code) VALUES ('David', 'david@example.com', 'IJKL3456');
INSERT INTO users (name, email, coupon_code) VALUES ('Eve', 'eve@example.com', 'MNOP7890');
INSERT INTO users (name, email, coupon_code) VALUES ('Frank', 'frank@example.com', 'QRST2345');
INSERT INTO users (name, email, coupon_code) VALUES ('Grace', 'grace@example.com', 'UVWX6789');
INSERT INTO users (name, email, coupon_code) VALUES ('Henry', 'henry@example.com', 'YZAB1234');
INSERT INTO users (name, email, coupon_code) VALUES ('Ivy', 'ivy@example.com', 'CDEF5678');
INSERT INTO users (name, email, coupon_code) VALUES ('Jack', 'jack@example.com', 'GHIJ9012');
