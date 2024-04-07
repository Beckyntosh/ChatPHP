CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS coupons (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(10) NOT NULL,
    discount INT(3) NOT NULL,
    user_id INT(6) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'john.doe@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Jane', 'Smith', 'jane.smith@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Mike', 'Johnson', 'mike.johnson@example.com');

INSERT INTO coupons (code, discount, user_id) VALUES ('ABC123', 10, 1);
INSERT INTO coupons (code, discount, user_id) VALUES ('DEF456', 15, 2);
INSERT INTO coupons (code, discount, user_id) VALUES ('GHI789', 20, 3);
INSERT INTO coupons (code, discount, user_id) VALUES ('JKL012', 10, 1);
INSERT INTO coupons (code, discount, user_id) VALUES ('MNO345', 15, 2);
INSERT INTO coupons (code, discount, user_id) VALUES ('PQR678', 20, 3);
INSERT INTO coupons (code, discount, user_id) VALUES ('STU901', 10, 1);
INSERT INTO coupons (code, discount, user_id) VALUES ('VWX234', 15, 2);
INSERT INTO coupons (code, discount, user_id) VALUES ('YZA567', 20, 3);
INSERT INTO coupons (code, discount, user_id) VALUES ('BCD890', 10, 1);
