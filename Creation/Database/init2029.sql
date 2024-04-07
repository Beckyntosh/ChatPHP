CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO products (name, description, category, price)
VALUES ('iPhone 13', 'Flagship smartphone from Apple', 'Electronics', '1199.99'),
       ('Samsung Galaxy S21', 'Flagship smartphone from Samsung', 'Electronics', '999.99'),
       ('Canon EOS R5', 'Professional mirrorless camera', 'Electronics', '3899.99'),
       ('Sony A7III', 'Full-frame mirrorless camera', 'Electronics', '1999.99'),
       ('Apple MacBook Pro', 'High-performance laptop from Apple', 'Electronics', '2499.99'),
       ('Dell XPS 13', 'Premium ultrabook from Dell', 'Electronics', '1699.99'),
       ('Nike Air Max 90', 'Iconic athletic shoes', 'Footwear', '129.99'),
       ('Adidas Ultraboost', 'Running shoes with Boost technology', 'Footwear', '179.99'),
       ('Rolex Submariner', 'Luxury diving watch', 'Watches', '9999.99'),
       ('Omega Speedmaster', 'Classic chronograph watch', 'Watches', '5999.99');