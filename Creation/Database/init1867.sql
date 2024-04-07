CREATE TABLE IF NOT EXISTS sales_data (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
quarter VARCHAR(30) NOT NULL,
sales DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO sales_data (quarter, sales) VALUES ('Q1 2024', 15000.50);
INSERT INTO sales_data (quarter, sales) VALUES ('Q2 2024', 18000.75);
INSERT INTO sales_data (quarter, sales) VALUES ('Q3 2024', 22000.99);
INSERT INTO sales_data (quarter, sales) VALUES ('Q4 2024', 19000.25);
INSERT INTO sales_data (quarter, sales) VALUES ('Q1 2025', 25000.80);
INSERT INTO sales_data (quarter, sales) VALUES ('Q2 2025', 21000.55);
INSERT INTO sales_data (quarter, sales) VALUES ('Q3 2025', 28000.30);
INSERT INTO sales_data (quarter, sales) VALUES ('Q4 2025', 32000.40);
INSERT INTO sales_data (quarter, sales) VALUES ('Q1 2026', 39000.95);
INSERT INTO sales_data (quarter, sales) VALUES ('Q2 2026', 41000.60);
