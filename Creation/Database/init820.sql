CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    loyalty_points INT,
    product_id INT
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255)
);

INSERT INTO users (username, loyalty_points, product_id) VALUES ('JohnDoe', 100, 1);
INSERT INTO users (username, loyalty_points, product_id) VALUES ('JaneSmith', 50, 2);
INSERT INTO users (username, loyalty_points, product_id) VALUES ('AliceJohnson', 75, 3);
INSERT INTO users (username, loyalty_points, product_id) VALUES ('BobBrown', 120, 4);
INSERT INTO users (username, loyalty_points, product_id) VALUES ('EmilyDavis', 90, 5);
INSERT INTO users (username, loyalty_points, product_id) VALUES ('MikeWilson', 110, 6);
INSERT INTO users (username, loyalty_points, product_id) VALUES ('SarahMartinez', 70, 7);
INSERT INTO users (username, loyalty_points, product_id) VALUES ('ChrisAnderson', 85, 8);
INSERT INTO users (username, loyalty_points, product_id) VALUES ('AmyThomas', 95, 9);
INSERT INTO users (username, loyalty_points, product_id) VALUES ('DavidGarcia', 105, 10);

INSERT INTO products (product_name) VALUES ('Shampoo');
INSERT INTO products (product_name) VALUES ('Conditioner');
INSERT INTO products (product_name) VALUES ('Lipstick');
INSERT INTO products (product_name) VALUES ('Cologne');
INSERT INTO products (product_name) VALUES ('Mascara');
INSERT INTO products (product_name) VALUES ('Face Cream');
INSERT INTO products (product_name) VALUES ('Perfume');
INSERT INTO products (product_name) VALUES ('Hair Gel');
INSERT INTO products (product_name) VALUES ('Sunscreen');
INSERT INTO products (product_name) VALUES ('Body Lotion');
