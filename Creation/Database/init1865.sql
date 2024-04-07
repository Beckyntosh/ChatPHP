CREATE TABLE IF NOT EXISTS sales_data (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        product_name VARCHAR(255) NOT NULL,
                        quantity_sold INT NOT NULL,
                        sales_date DATE NOT NULL
                        );
INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES ('Product1', 100, '2024-01-01');
INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES ('Product2', 200, '2024-01-02');
INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES ('Product3', 150, '2024-01-03');
INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES ('Product4', 120, '2024-01-04');
INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES ('Product5', 180, '2024-01-05');
INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES ('Product6', 90, '2024-01-06');
INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES ('Product7', 210, '2024-01-07');
INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES ('Product8', 140, '2024-01-08');
INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES ('Product9', 170, '2024-01-09');
INSERT INTO sales_data (product_name, quantity_sold, sales_date) VALUES ('Product10', 110, '2024-01-10');
