CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(100)
);

INSERT INTO products (name, description, price, image) VALUES ('Handbag A', 'Stylish black handbag', 50.00, 'image1.jpg');
INSERT INTO products (name, description, price, image) VALUES ('Handbag B', 'Elegant white handbag', 75.00, 'image2.jpg');
INSERT INTO products (name, description, price, image) VALUES ('Handbag C', 'Casual brown handbag', 40.00, 'image3.jpg');
INSERT INTO products (name, description, price, image) VALUES ('Handbag D', 'Chic red handbag', 60.00, 'image4.jpg');
INSERT INTO products (name, description, price, image) VALUES ('Handbag E', 'Vintage floral handbag', 55.00, 'image5.jpg');
INSERT INTO products (name, description, price, image) VALUES ('Handbag F', 'Modern geometric handbag', 70.00, 'image6.jpg');
INSERT INTO products (name, description, price, image) VALUES ('Handbag G', 'Classic leather handbag', 90.00, 'image7.jpg');
INSERT INTO products (name, description, price, image) VALUES ('Handbag H', 'Funky denim handbag', 45.00, 'image8.jpg');
INSERT INTO products (name, description, price, image) VALUES ('Handbag I', 'Boho fringe handbag', 65.00, 'image9.jpg');
INSERT INTO products (name, description, price, image) VALUES ('Handbag J', 'Sporty nylon handbag', 30.00, 'image10.jpg');
