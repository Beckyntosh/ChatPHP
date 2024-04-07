CREATE TABLE IF NOT EXISTS sales_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    sold_quantity INT(10) NOT NULL,
    sales_period VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES ('Shovel', 100, 'Q1 2024');
INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES ('Rake', 75, 'Q1 2024');
INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES ('Hoe', 50, 'Q1 2024');
INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES ('Pruning Shears', 120, 'Q1 2024');
INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES ('Gloves', 90, 'Q1 2024');
INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES ('Weeder', 65, 'Q1 2024');
INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES ('Watering Can', 110, 'Q1 2024');
INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES ('Trowel', 85, 'Q1 2024');
INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES ('Wheelbarrow', 40, 'Q1 2024');
INSERT INTO sales_data (product_name, sold_quantity, sales_period) VALUES ('Plant Stand', 55, 'Q1 2024');
