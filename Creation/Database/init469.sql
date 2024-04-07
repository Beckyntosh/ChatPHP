CREATE TABLE IF NOT EXISTS ChildSupport (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
income DECIMAL(10,2) NOT NULL,
children INT(3) NOT NULL,
custody VARCHAR(50),
estimated_support DECIMAL(10,2),
reg_date TIMESTAMP
);

INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (50000.00, 2, 'Sole', 20000.00);
INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (60000.00, 1, 'Sole', 12000.00);
INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (75000.00, 3, 'Joint', 22500.00);
INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (40000.00, 2, 'Joint', 10000.00);
INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (80000.00, 1, 'Sole', 16000.00);
INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (90000.00, 4, 'Joint', 36000.00);
INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (55000.00, 3, 'Sole', 16500.00);
INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (70000.00, 1, 'Joint', 14000.00);
INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (100000.00, 2, 'Joint', 25000.00);
INSERT INTO ChildSupport (income, children, custody, estimated_support) VALUES (62000.00, 3, 'Joint', 18600.00);