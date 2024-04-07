CREATE TABLE IF NOT EXISTS tax_records (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
income FLOAT,
deductions FLOAT,
filing_status VARCHAR(30),
tax_owed FLOAT,
reg_date TIMESTAMP
);

INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (50000.00, 10000.00, 'single', 9900.00);
INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (75000.00, 15000.00, 'married', 13500.00);
INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (60000.00, 12000.00, 'single', 10800.00);
INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (80000.00, 20000.00, 'married', 14400.00);
INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (45000.00, 9000.00, 'single', 8910.00);
INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (70000.00, 14000.00, 'married', 12600.00);
INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (85000.00, 17000.00, 'single', 18700.00);
INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (55000.00, 11000.00, 'married', 9900.00);
INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (90000.00, 18000.00, 'single', 17100.00);
INSERT INTO tax_records (income, deductions, filing_status, tax_owed) VALUES (65000.00, 13000.00, 'married', 11700.00);
