CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    year INT(4) NOT NULL,
    report_name VARCHAR(50) NOT NULL,
    revenue DECIMAL(10,2) NOT NULL,
    expense DECIMAL(10,2) NOT NULL,
    profit DECIMAL(10,2) AS (revenue - expense),
    reg_date TIMESTAMP
);

INSERT INTO financial_reports (year, report_name, revenue, expense, reg_date) VALUES (2021, 'Quarterly Report Q1', 10000.50, 5000.25, NOW());
INSERT INTO financial_reports (year, report_name, revenue, expense, reg_date) VALUES (2021, 'Quarterly Report Q2', 15000.75, 7000.45, NOW());
INSERT INTO financial_reports (year, report_name, revenue, expense, reg_date) VALUES (2021, 'Quarterly Report Q3', 12000.30, 6000.60, NOW());
INSERT INTO financial_reports (year, report_name, revenue, expense, reg_date) VALUES (2021, 'Quarterly Report Q4', 18000.90, 8000.75, NOW());
INSERT INTO financial_reports (year, report_name, revenue, expense, reg_date) VALUES (2022, 'Quarterly Report Q1', 10500.35, 5500.20, NOW());
INSERT INTO financial_reports (year, report_name, revenue, expense, reg_date) VALUES (2022, 'Quarterly Report Q2', 15500.80, 7200.35, NOW());
INSERT INTO financial_reports (year, report_name, revenue, expense, reg_date) VALUES (2022, 'Quarterly Report Q3', 12500.65, 6100.50, NOW());
INSERT INTO financial_reports (year, report_name, revenue, expense, reg_date) VALUES (2022, 'Quarterly Report Q4', 18500.10, 8100.90, NOW());
INSERT INTO financial_reports (year, report_name, revenue, expense, reg_date) VALUES (2023, 'Quarterly Report Q1', 11000.40, 5600.30, NOW());
INSERT INTO financial_reports (year, report_name, revenue, expense, reg_date) VALUES (2023, 'Quarterly Report Q2', 16000.60, 7300.40, NOW());
