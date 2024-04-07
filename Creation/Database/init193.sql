CREATE TABLE IF NOT EXISTS products_comparison (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    features TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO products_comparison (product_name, features, price) VALUES 
("Product A", "Feature 1, Feature 2, Feature 3", 100.00),
("Product B", "Feature 1, Feature 4, Feature 5", 150.50),
("Product C", "Feature 2, Feature 4, Feature 6", 200.00),
("Product D", "Feature 1, Feature 3, Feature 6", 120.75),
("Product E", "Feature 3, Feature 5, Feature 7", 180.25),
("Product F", "Feature 4, Feature 6, Feature 8", 220.00),
("Product G", "Feature 1, Feature 5, Feature 9", 90.50),
("Product H", "Feature 2, Feature 6, Feature 10", 140.75),
("Product I", "Feature 4, Feature 7, Feature 11", 160.25),
("Product J", "Feature 3, Feature 8, Feature 12", 190.00);
