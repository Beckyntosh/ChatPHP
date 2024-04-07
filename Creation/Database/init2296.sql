CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(60),
    verification_code VARCHAR(50),
    is_verified BOOLEAN DEFAULT 0,
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, verification_code) VALUES ('Alice', 'alice@example.com', 'password123', 'abcd1234');
INSERT INTO users (username, email, password, verification_code) VALUES ('Bob', 'bob@example.com', 'securepass', 'efgh5678');
INSERT INTO users (username, email, password, verification_code) VALUES ('Charlie', 'charlie@example.com', '12345678', 'ijkl9101');
INSERT INTO users (username, email, password, verification_code) VALUES ('David', 'david@example.com', 'davidpass', 'mnop1112');
INSERT INTO users (username, email, password, verification_code) VALUES ('Eve', 'eve@example.com', 'password321', 'qrst1314');
INSERT INTO users (username, email, password, verification_code) VALUES ('Frank', 'frank@example.com', 'securepass321', 'uvwx1516');
INSERT INTO users (username, email, password, verification_code) VALUES ('Grace', 'grace@example.com', 'password1234', 'yzab1718');
INSERT INTO users (username, email, password, verification_code) VALUES ('Henry', 'henry@example.com', 'password567', 'cdef1920');
INSERT INTO users (username, email, password, verification_code) VALUES ('Ivy', 'ivy@example.com', 'securepass567', 'ghij2122');
INSERT INTO users (username, email, password, verification_code) VALUES ('Jack', 'jack@example.com', 'password890', 'klmn2324');
