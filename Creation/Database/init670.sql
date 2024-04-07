CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255) NOT NULL
);

INSERT INTO products (name, description, price, image_url) VALUES ('Product 1', 'Description for Product 1', 10.99, 'image1.jpg');
INSERT INTO products (name, description, price, image_url) VALUES ('Product 2', 'Description for Product 2', 15.99, 'image2.jpg');
INSERT INTO products (name, description, price, image_url) VALUES ('Product 3', 'Description for Product 3', 20.99, 'image3.jpg');
INSERT INTO products (name, description, price, image_url) VALUES ('Product 4', 'Description for Product 4', 25.99, 'image4.jpg');
INSERT INTO products (name, description, price, image_url) VALUES ('Product 5', 'Description for Product 5', 30.99, 'image5.jpg');
INSERT INTO products (name, description, price, image_url) VALUES ('Product 6', 'Description for Product 6', 35.99, 'image6.jpg');
INSERT INTO products (name, description, price, image_url) VALUES ('Product 7', 'Description for Product 7', 40.99, 'image7.jpg');
INSERT INTO products (name, description, price, image_url) VALUES ('Product 8', 'Description for Product 8', 45.99, 'image8.jpg');
INSERT INTO products (name, description, price, image_url) VALUES ('Product 9', 'Description for Product 9', 50.99, 'image9.jpg');
INSERT INTO products (name, description, price, image_url) VALUES ('Product 10', 'Description for Product 10', 55.99, 'image10.jpg');
