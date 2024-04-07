CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image LONGBLOB NOT NULL
);

INSERT INTO products (name, image) VALUES
('Product 1', 'image1.jpg'),
('Product 2', 'image2.jpg'),
('Product 3', 'image3.jpg'),
('Product 4', 'image4.jpg'),
('Product 5', 'image5.jpg'),
('Product 6', 'image6.jpg'),
('Product 7', 'image7.jpg'),
('Product 8', 'image8.jpg'),
('Product 9', 'image9.jpg'),
('Product 10', 'image10.jpg');