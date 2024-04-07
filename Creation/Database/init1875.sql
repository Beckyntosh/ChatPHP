CREATE TABLE IF NOT EXISTS sales_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    quarter VARCHAR(10) NOT NULL,
    product_id INT NOT NULL,
    sales_volume INT NOT NULL,
    sales_date DATE NOT NULL
);

INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES ('Q1 2024', 1, 100, '2024-01-01');
INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES ('Q1 2024', 2, 150, '2024-01-15');
INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES ('Q1 2024', 3, 200, '2024-02-05');
INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES ('Q1 2024', 4, 120, '2024-03-10');
INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES ('Q1 2024', 5, 180, '2024-03-25');
INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES ('Q1 2024', 6, 90, '2024-04-12');
INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES ('Q1 2024', 7, 210, '2024-04-28');
INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES ('Q1 2024', 8, 140, '2024-05-15');
INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES ('Q1 2024', 9, 170, '2024-06-02');
INSERT INTO sales_data (quarter, product_id, sales_volume, sales_date) VALUES ('Q1 2024', 10, 110, '2024-06-20');
