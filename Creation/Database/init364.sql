CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS coupons (
    coupon_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    coupon_code VARCHAR(50) NOT NULL,
    user_id INT(6) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username, email) VALUES ('john_doe', 'john.doe@example.com');
INSERT INTO users (username, email) VALUES ('jane_smith', 'jane.smith@example.com');
INSERT INTO users (username, email) VALUES ('mike_jones', 'mike.jones@example.com');
INSERT INTO users (username, email) VALUES ('sarah_williams', 'sarah.williams@example.com');
INSERT INTO users (username, email) VALUES ('chris_brown', 'chris.brown@example.com');
INSERT INTO users (username, email) VALUES ('emily_taylor', 'emily.taylor@example.com');
INSERT INTO users (username, email) VALUES ('andrew_clark', 'andrew.clark@example.com');
INSERT INTO users (username, email) VALUES ('lisa_adams', 'lisa.adams@example.com');
INSERT INTO users (username, email) VALUES ('kevin_miller', 'kevin.miller@example.com');
INSERT INTO users (username, email) VALUES ('amanda_white', 'amanda.white@example.com');