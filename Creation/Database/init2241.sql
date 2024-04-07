CREATE TABLE product_updates (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(50) NOT NULL,
  signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO product_updates (email) VALUES ('example1@example.com');
INSERT INTO product_updates (email) VALUES ('example2@example.com');
INSERT INTO product_updates (email) VALUES ('example3@example.com');
INSERT INTO product_updates (email) VALUES ('example4@example.com');
INSERT INTO product_updates (email) VALUES ('example5@example.com');
INSERT INTO product_updates (email) VALUES ('example6@example.com');
INSERT INTO product_updates (email) VALUES ('example7@example.com');
INSERT INTO product_updates (email) VALUES ('example8@example.com');
INSERT INTO product_updates (email) VALUES ('example9@example.com');
INSERT INTO product_updates (email) VALUES ('example10@example.com');