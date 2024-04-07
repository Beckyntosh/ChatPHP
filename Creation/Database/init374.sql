CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    verification_code VARCHAR(50) NOT NULL,
    verified INT(1) NOT NULL DEFAULT '0',
    reg_date TIMESTAMP
);

INSERT INTO users (email, verification_code, verified, reg_date) VALUES ('user1@example.com', 'abcd1234', 1, NOW());
INSERT INTO users (email, verification_code, verified, reg_date) VALUES ('user2@example.com', 'efgh5678', 0, NOW());
INSERT INTO users (email, verification_code, verified, reg_date) VALUES ('user3@example.com', 'ijkl9090', 0, NOW());
INSERT INTO users (email, verification_code, verified, reg_date) VALUES ('user4@example.com', 'mnop1234', 1, NOW());
INSERT INTO users (email, verification_code, verified, reg_date) VALUES ('user5@example.com', 'qrst5678', 0, NOW());
INSERT INTO users (email, verification_code, verified, reg_date) VALUES ('user6@example.com', 'uvwx9090', 0, NOW());
INSERT INTO users (email, verification_code, verified, reg_date) VALUES ('user7@example.com', 'yzab1234', 1, NOW());
INSERT INTO users (email, verification_code, verified, reg_date) VALUES ('user8@example.com', 'cdef5678', 0, NOW());
INSERT INTO users (email, verification_code, verified, reg_date) VALUES ('user9@example.com', 'ghij9090', 0, NOW());
INSERT INTO users (email, verification_code, verified, reg_date) VALUES ('user10@example.com', 'klmn1234', 1, NOW());
