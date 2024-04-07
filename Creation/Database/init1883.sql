CREATE TABLE IF NOT EXISTS sales_data (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
sales_date DATE NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO sales_data (sales_date, amount) VALUES ('2024-01-01', 1000.50);
INSERT INTO sales_data (sales_date, amount) VALUES ('2024-01-02', 1500.75);
INSERT INTO sales_data (sales_date, amount) VALUES ('2024-01-03', 2000.20);
INSERT INTO sales_data (sales_date, amount) VALUES ('2024-01-04', 1800.60);
INSERT INTO sales_data (sales_date, amount) VALUES ('2024-01-05', 2500.90);
INSERT INTO sales_data (sales_date, amount) VALUES ('2024-01-06', 1900.40);
INSERT INTO sales_data (sales_date, amount) VALUES ('2024-01-07', 2200.30);
INSERT INTO sales_data (sales_date, amount) VALUES ('2024-01-08', 2700.80);
INSERT INTO sales_data (sales_date, amount) VALUES ('2024-01-09', 3000.10);
INSERT INTO sales_data (sales_date, amount) VALUES ('2024-01-10', 2800.70);
