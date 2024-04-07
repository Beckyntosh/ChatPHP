CREATE TABLE IF NOT EXISTS product_updates (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO product_updates (firstname, lastname, email) VALUES ('Alice', 'Smith', 'alice@example.com');
INSERT INTO product_updates (firstname, lastname, email) VALUES ('Bob', 'Johnson', 'bob@example.com');
INSERT INTO product_updates (firstname, lastname, email) VALUES ('Charlie', 'Williams', 'charlie@example.com');
INSERT INTO product_updates (firstname, lastname, email) VALUES ('David', 'Brown', 'david@example.com');
INSERT INTO product_updates (firstname, lastname, email) VALUES ('Emma', 'Jones', 'emma@example.com');
INSERT INTO product_updates (firstname, lastname, email) VALUES ('Frank', 'Taylor', 'frank@example.com');
INSERT INTO product_updates (firstname, lastname, email) VALUES ('Grace', 'Anderson', 'grace@example.com');
INSERT INTO product_updates (firstname, lastname, email) VALUES ('Henry', 'Thomas', 'henry@example.com');
INSERT INTO product_updates (firstname, lastname, email) VALUES ('Ivy', 'Martinez', 'ivy@example.com');
INSERT INTO product_updates (firstname, lastname, email) VALUES ('Jack', 'Rodriguez', 'jack@example.com');