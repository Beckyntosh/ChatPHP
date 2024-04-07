CREATE TABLE IF NOT EXISTS sales_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    sales_quantity INT(10) NOT NULL,
    sales_period VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO sales_data (product_name, sales_quantity, sales_period) VALUES ('Pencil', 100, 'Q1 2024');
INSERT INTO sales_data (product_name, sales_quantity, sales_period) VALUES ('Notebook', 75, 'Q1 2024');
INSERT INTO sales_data (product_name, sales_quantity, sales_period) VALUES ('Eraser', 50, 'Q1 2024');
INSERT INTO sales_data (product_name, sales_quantity, sales_period) VALUES ('Ruler', 120, 'Q1 2024');
INSERT INTO sales_data (product_name, sales_quantity, sales_period) VALUES ('Crayons', 90, 'Q1 2024');
INSERT INTO sales_data (product_name, sales_quantity, sales_period) VALUES ('Glue', 65, 'Q1 2024');
INSERT INTO sales_data (product_name, sales_quantity, sales_period) VALUES ('Scissors', 80, 'Q1 2024');
INSERT INTO sales_data (product_name, sales_quantity, sales_period) VALUES ('Backpack', 40, 'Q1 2024');
INSERT INTO sales_data (product_name, sales_quantity, sales_period) VALUES ('Markers', 55, 'Q1 2024');
INSERT INTO sales_data (product_name, sales_quantity, sales_period) VALUES ('Sharpener', 70, 'Q1 2024');
