CREATE TABLE IF NOT EXISTS sales_data (
    id int(11) NOT NULL AUTO_INCREMENT,
    quarter varchar(10) NOT NULL,
    category varchar(50) NOT NULL,
    amount decimal(10,2) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO sales_data (quarter, category, amount) VALUES ('Q1 2024', 'Product A', 1000.00);
INSERT INTO sales_data (quarter, category, amount) VALUES ('Q1 2024', 'Product B', 1500.50);
INSERT INTO sales_data (quarter, category, amount) VALUES ('Q1 2024', 'Product C', 800.75);
INSERT INTO sales_data (quarter, category, amount) VALUES ('Q1 2024', 'Product D', 2000.25);
INSERT INTO sales_data (quarter, category, amount) VALUES ('Q1 2024', 'Product E', 1200.95);
INSERT INTO sales_data (quarter, category, amount) VALUES ('Q1 2024', 'Product F', 1800.80);
INSERT INTO sales_data (quarter, category, amount) VALUES ('Q1 2024', 'Product G', 950.20);
INSERT INTO sales_data (quarter, category, amount) VALUES ('Q1 2024', 'Product H', 1600.30);
INSERT INTO sales_data (quarter, category, amount) VALUES ('Q1 2024', 'Product I', 2100.60);
INSERT INTO sales_data (quarter, category, amount) VALUES ('Q1 2024', 'Product J', 1350.75);
