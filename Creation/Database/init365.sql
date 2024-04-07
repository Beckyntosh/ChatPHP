CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS coupons (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(30) NOT NULL,
    discount DECIMAL(10,2) NOT NULL,
    user_id INT(6) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Inserting values into users table
INSERT INTO users (email) VALUES ('user1@example.com');
INSERT INTO users (email) VALUES ('user2@example.com');
INSERT INTO users (email) VALUES ('user3@example.com');
INSERT INTO users (email) VALUES ('user4@example.com');
INSERT INTO users (email) VALUES ('user5@example.com');

-- Inserting values into coupons table
INSERT INTO coupons (code, discount, user_id) VALUES ('CODE1', 10.00, 1);
INSERT INTO coupons (code, discount, user_id) VALUES ('CODE2', 10.00, 2);
INSERT INTO coupons (code, discount, user_id) VALUES ('CODE3', 10.00, 3);
INSERT INTO coupons (code, discount, user_id) VALUES ('CODE4', 10.00, 4);
INSERT INTO coupons (code, discount, user_id) VALUES ('CODE5', 10.00, 5);