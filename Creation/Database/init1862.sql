CREATE TABLE IF NOT EXISTS sales_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    product_name VARCHAR(50) NOT NULL,
    quantity_sold INT(10) NOT NULL,
    sale_date DATE NOT NULL,
    revenue FLOAT NOT NULL
);

INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('Book1', 100, '2024-01-10', 500.25);
INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('Book2', 75, '2024-01-15', 320.50);
INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('Book3', 120, '2024-01-21', 700.75);
INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('Book4', 90, '2024-02-05', 420.99);
INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('Book5', 60, '2024-02-12', 300.30);
INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('Book6', 110, '2024-02-18', 650.80);
INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('Book7', 85, '2024-03-02', 400.45);
INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('Book8', 70, '2024-03-11', 350.60);
INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('Book9', 95, '2024-03-19', 450.90);
INSERT INTO sales_data (product_name, quantity_sold, sale_date, revenue) VALUES ('Book10', 65, '2024-03-25', 280.25);
