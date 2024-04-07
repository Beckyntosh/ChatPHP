CREATE TABLE IF NOT EXISTS salesData (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(30) NOT NULL,
quantity_sold INT(10),
sale_amount DECIMAL(10, 2),
sale_date DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert 10 sample values
INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES ('Organic Apples', 100, 500.00, '2024-01-05');
INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES ('Organic Bananas', 80, 300.50, '2024-01-10');
INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES ('Organic Strawberries', 120, 700.25, '2024-01-15');
INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES ('Organic Spinach', 50, 250.75, '2024-01-20');
INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES ('Organic Blueberries', 65, 350.80, '2024-01-25');
INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES ('Organic Carrots', 70, 450.30, '2024-01-30');
INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES ('Organic Tomatoes', 90, 400.20, '2024-02-05');
INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES ('Organic Kale', 40, 200.50, '2024-02-10');
INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES ('Organic Oranges', 75, 320.60, '2024-02-15');
INSERT INTO salesData (product_name, quantity_sold, sale_amount, sale_date) VALUES ('Organic Peppers', 60, 270.40, '2024-02-20');