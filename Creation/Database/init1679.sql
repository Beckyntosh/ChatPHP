CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO products (name, description, category, price, image_url) 
VALUES ('iPhone 13', 'Latest iPhone model', 'Smartphones', 999.99, 'https://example.com/iphone13.jpg'),
       ('Samsung Galaxy S21', 'Latest Samsung Galaxy model', 'Smartphones', 899.99, 'https://example.com/galaxyS21.jpg'),
       ('Google Pixel 6', 'Google\'s flagship phone', 'Smartphones', 799.99, 'https://example.com/pixel6.jpg'),
       ('Sony A7 III', 'Mirrorless camera', 'Cameras', 1999.99, 'https://example.com/a7iii.jpg'),
       ('MacBook Pro 2021', 'Apple\'s latest laptop', 'Laptops', 1499.99, 'https://example.com/macbookpro.jpg'),
       ('Dyson V11', 'Cordless vacuum cleaner', 'Home Appliances', 499.99, 'https://example.com/dysonv11.jpg'),
       ('Fitbit Charge 5', 'Fitness tracker', 'Wearable Tech', 179.99, 'https://example.com/fitbitcharge5.jpg'),
       ('Nespresso Vertuo Plus', 'Coffee machine', 'Kitchen Appliances', 199.99, 'https://example.com/nespressovertuo.jpg'),
       ('LG CX OLED TV', '4K OLED TV', 'TVs', 1999.99, 'https://example.com/lgcxoled.jpg'),
       ('Apple Watch Series 7', 'Latest Apple Watch', 'Wearable Tech', 399.99, 'https://example.com/applewatchseries7.jpg');
