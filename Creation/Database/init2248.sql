CREATE TABLE IF NOT EXISTS product_updates (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Inserting values into the product_updates table
INSERT INTO product_updates (email) VALUES ('user1@example.com');
INSERT INTO product_updates (email) VALUES ('user2@example.com');
INSERT INTO product_updates (email) VALUES ('user3@example.com');
INSERT INTO product_updates (email) VALUES ('user4@example.com');
INSERT INTO product_updates (email) VALUES ('user5@example.com');
INSERT INTO product_updates (email) VALUES ('user6@example.com');
INSERT INTO product_updates (email) VALUES ('user7@example.com');
INSERT INTO product_updates (email) VALUES ('user8@example.com');
INSERT INTO product_updates (email) VALUES ('user9@example.com');
INSERT INTO product_updates (email) VALUES ('user10@example.com');