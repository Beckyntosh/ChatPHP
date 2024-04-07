CREATE TABLE IF NOT EXISTS Products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,
    reg_date TIMESTAMP
);

-- Create Orders table
CREATE TABLE IF NOT EXISTS Orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT(6) UNSIGNED,
    quantity INT(3) NOT NULL,
    order_date TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Products(id)
);

-- Insert sample data into Products table
INSERT INTO Products (name, description, reg_date) VALUES ('Wooden Dining Table', 'Custom-sized dining table', NOW());
INSERT INTO Products (name, description, reg_date) VALUES ('Skin Care Products', 'Various skin care items', NOW());

-- Insert sample data into Orders table
INSERT INTO Orders (product_id, quantity, order_date) VALUES (1, 2, NOW());
INSERT INTO Orders (product_id, quantity, order_date) VALUES (2, 3, NOW());
INSERT INTO Orders (product_id, quantity, order_date) VALUES (1, 1, NOW());
INSERT INTO Orders (product_id, quantity, order_date) VALUES (2, 2, NOW());
INSERT INTO Orders (product_id, quantity, order_date) VALUES (1, 3, NOW());
INSERT INTO Orders (product_id, quantity, order_date) VALUES (2, 1, NOW());
INSERT INTO Orders (product_id, quantity, order_date) VALUES (1, 2, NOW());
INSERT INTO Orders (product_id, quantity, order_date) VALUES (2, 3, NOW());
INSERT INTO Orders (product_id, quantity, order_date) VALUES (1, 1, NOW());
INSERT INTO Orders (product_id, quantity, order_date) VALUES (2, 2, NOW());
