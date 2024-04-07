CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    reg_date TIMESTAMP
);

-- Insert sample data into products table
INSERT INTO products (name, description, price, image)
VALUES ('iPhone 13', 'Latest iPhone model', 999.99, 'iphone13.jpg'),
       ('Samsung Galaxy S21', 'Flagship Samsung phone', 899.99, 'samsungs21.jpg'),
       ('MacBook Pro', 'High-performance laptop', 1499.99, 'macbookpro.jpg'),
       ('Canon EOS R5', 'Professional mirrorless camera', 3499.99, 'canoneosr5.jpg'),
       ('Sony Alpha A7 III', 'Full-frame mirrorless camera', 1999.99, 'sonya7iii.jpg'),
       ('Huawei P40 Pro', 'Top Huawei smartphone', 799.99, 'huaweip40pro.jpg'),
       ('iPad Pro', 'Powerful tablet', 1099.99, 'ipadpro.jpg'),
       ('Microsoft Surface Laptop 4', 'Sleek ultrabook', 1299.99, 'surfacelaptop4.jpg'),
       ('Nikon D850', 'Pro DSLR camera', 2999.99, 'nikond850.jpg'),
       ('LG UltraGear 27GN950-B', 'Gaming monitor', 699.99, 'lgultragear.jpg');
