CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(50) NOT NULL,
    brand VARCHAR(30),
    price DECIMAL(10, 2),
    description TEXT,
    imageURL VARCHAR(100),
    reg_date TIMESTAMP
);

INSERT INTO products (productName, brand, price, description, imageURL)
VALUES ('T-shirt', 'Brand A', 19.99, 'Simple and comfortable kids t-shirt.', 'https://example.com/tshirt1.jpg'),
       ('Dress', 'Brand B', 29.99, 'Beautiful dress for special occasions.', 'https://example.com/dress1.jpg'),
       ('Jeans', 'Brand C', 39.99, 'Stylish jeans for everyday wear.', 'https://example.com/jeans1.jpg'),
       ('Sweater', 'Brand D', 24.99, 'Warm and cozy sweater for cold days.', 'https://example.com/sweater1.jpg'),
       ('Jacket', 'Brand E', 49.99, 'Lightweight jacket for spring.', 'https://example.com/jacket1.jpg'),
       ('Skirt', 'Brand F', 34.99, 'Elegant skirt for special events.', 'https://example.com/skirt1.jpg'),
       ('Shorts', 'Brand G', 14.99, 'Casual shorts for summer fun.', 'https://example.com/shorts1.jpg'),
       ('Coat', 'Brand H', 59.99, 'Stylish coat for cold weather.', 'https://example.com/coat1.jpg'),
       ('Socks', 'Brand I', 5.99, 'Colorful and comfortable socks.', 'https://example.com/socks1.jpg'),
       ('Pants', 'Brand J', 49.99, 'Versatile pants for any occasion.', 'https://example.com/pants1.jpg');
