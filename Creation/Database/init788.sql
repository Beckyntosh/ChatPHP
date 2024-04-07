CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
email VARCHAR(50)
);

INSERT INTO users (name, email) VALUES ('John Doe', 'john.doe@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane.smith@example.com');
INSERT INTO users (name, email) VALUES ('Alice Johnson', 'alice.johnson@example.com');
INSERT INTO users (name, email) VALUES ('Bob Brown', 'bob.brown@example.com');
INSERT INTO users (name, email) VALUES ('Emily Davis', 'emily.davis@example.com');

CREATE TABLE IF NOT EXISTS products (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
price DECIMAL(10,2)
);

INSERT INTO products (name, price) VALUES ('Sunglasses', 25.00);
INSERT INTO products (name, price) VALUES ('Reading Glasses', 15.00);
INSERT INTO products (name, price) VALUES ('Blue Light Glasses', 20.00);
INSERT INTO products (name, price) VALUES ('Sport Sunglasses', 30.00);
INSERT INTO products (name, price) VALUES ('Designer Sunglasses', 50.00);

INSERT INTO orders (user_id, product_id, order_status) VALUES (1, 1, 'Processing');
INSERT INTO orders (user_id, product_id, order_status) VALUES (2, 3, 'Shipped');
INSERT INTO orders (user_id, product_id, order_status) VALUES (3, 2, 'Delivered');
INSERT INTO orders (user_id, product_id, order_status) VALUES (4, 5, 'Processing');
INSERT INTO orders (user_id, product_id, order_status) VALUES (5, 4, 'Shipped');
