CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50),
    category VARCHAR(50)
);

INSERT INTO users (email, password) VALUES ('user1@example.com', 'password1');
INSERT INTO users (email, password) VALUES ('user2@example.com', 'password2');
INSERT INTO users (email, password) VALUES ('user3@example.com', 'password3');
INSERT INTO users (email, password) VALUES ('user4@example.com', 'password4');
INSERT INTO users (email, password) VALUES ('user5@example.com', 'password5');
INSERT INTO users (email, password) VALUES ('user6@example.com', 'password6');
INSERT INTO users (email, password) VALUES ('user7@example.com', 'password7');
INSERT INTO users (email, password) VALUES ('user8@example.com', 'password8');
INSERT INTO users (email, password) VALUES ('user9@example.com', 'password9');
INSERT INTO users (email, password) VALUES ('user10@example.com', 'password10');

INSERT INTO products (product_name, category) VALUES ('Product1', 'Category1');
INSERT INTO products (product_name, category) VALUES ('Product2', 'Category2');
INSERT INTO products (product_name, category) VALUES ('Product3', 'Category3');
INSERT INTO products (product_name, category) VALUES ('Product4', 'Category4');
INSERT INTO products (product_name, category) VALUES ('Product5', 'Category5');
INSERT INTO products (product_name, category) VALUES ('Product6', 'Category6');
INSERT INTO products (product_name, category) VALUES ('Product7', 'Category7');
INSERT INTO products (product_name, category) VALUES ('Product8', 'Category8');
INSERT INTO products (product_name, category) VALUES ('Product9', 'Category9');
INSERT INTO products (product_name, category) VALUES ('Product10', 'Category10');
