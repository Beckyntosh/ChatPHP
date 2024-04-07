CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    productSize VARCHAR(50) NOT NULL,
    quantity INT(10) NOT NULL,
    customerName VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Data
INSERT INTO orders (productName, productSize, quantity, customerName) VALUES ('Custom Maternity Dress', 'Medium', 2, 'Alice');
INSERT INTO orders (productName, productSize, quantity, customerName) VALUES ('Maternity Leggings', 'Small', 3, 'Bob');
INSERT INTO orders (productName, productSize, quantity, customerName) VALUES ('Maternity Jeans', 'Large', 1, 'Carol');
INSERT INTO orders (productName, productSize, quantity, customerName) VALUES ('Maternity Tops', 'Medium', 4, 'David');
INSERT INTO orders (productName, productSize, quantity, customerName) VALUES ('Maternity Swimwear', 'Small', 2, 'Emily');
INSERT INTO orders (productName, productSize, quantity, customerName) VALUES ('Maternity Activewear', 'Medium', 3, 'Fiona');
INSERT INTO orders (productName, productSize, quantity, customerName) VALUES ('Maternity Workwear', 'Large', 2, 'George');
INSERT INTO orders (productName, productSize, quantity, customerName) VALUES ('Maternity Sleepwear', 'Medium', 3, 'Hannah');
INSERT INTO orders (productName, productSize, quantity, customerName) VALUES ('Maternity Skirts', 'Small', 1, 'Ian');
INSERT INTO orders (productName, productSize, quantity, customerName) VALUES ('Maternity Loungewear', 'Large', 2, 'Jane');
