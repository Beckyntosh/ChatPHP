CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_name VARCHAR(255) NOT NULL,
    report_period VARCHAR(50) NOT NULL,
    report_year INT(4) NOT NULL,
    content TEXT,
    company_sector VARCHAR(100),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO financial_reports (report_name, report_period, report_year, content, company_sector) 
VALUES ('Q2 Earnings Report', 'Q2', 2023, 'Lorem ipsum content', 'Tech'),
       ('Annual Financial Report', 'Annual', 2023, 'Lorem ipsum content', 'Electronics'),
       ('Q1 Financial Report', 'Q1', 2023, 'Lorem ipsum content', 'Tech'),
       ('Q3 Earnings Report', 'Q3', 2023, 'Lorem ipsum content', 'Electronics'),
       ('Quarterly Report', 'Q4', 2023, 'Lorem ipsum content', 'Tech'),
       ('FY2023 Report', 'Full Year', 2023, 'Lorem ipsum content', 'Electronics'),
       ('Q4 Financial Report', 'Q4', 2023, 'Lorem ipsum content', 'Tech'),
       ('Yearly Summary', 'Annual', 2023, 'Lorem ipsum content', 'Electronics'),
       ('Q2 Earnings Report', 'Q2', 2023, 'Lorem ipsum content', 'Tech'),
       ('Financial Highlights Report', 'Monthly', 2023, 'Lorem ipsum content', 'Electronics');