CREATE TABLE IF NOT EXISTS product_updates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO product_updates (email) VALUES ('user1@gmail.com');
INSERT INTO product_updates (email) VALUES ('user2@gmail.com');
INSERT INTO product_updates (email) VALUES ('user3@gmail.com');
INSERT INTO product_updates (email) VALUES ('user4@gmail.com');
INSERT INTO product_updates (email) VALUES ('user5@gmail.com');
INSERT INTO product_updates (email) VALUES ('user6@gmail.com');
INSERT INTO product_updates (email) VALUES ('user7@gmail.com');
INSERT INTO product_updates (email) VALUES ('user8@gmail.com');
INSERT INTO product_updates (email) VALUES ('user9@gmail.com');
INSERT INTO product_updates (email) VALUES ('user10@gmail.com');
