CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(50) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year YEAR(4) NOT NULL,
    quarter INT(1) NOT NULL,
    content TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO financial_reports (company_name, report_type, year, quarter, content) VALUES 
('Company A', 'Earnings', 2023, 2, 'Lorem ipsum dolor sit amet'),
('Company B', 'Investment', 2023, 2, 'Consectetur adipiscing elit'),
('Company C', 'Income', 2023, 3, 'Sed do eiusmod tempor incididunt'),
('Company D', 'Revenue', 2023, 2, 'Ut labore et dolore magna'),
('Company E', 'Profit', 2023, 2, 'Aliqua. Ut enim ad minim veniam'),
('Company F', 'Loss', 2023, 1, 'Quis nostrud exercitation ullamco'),
('Company G', 'Balance Sheet', 2023, 2, 'Laboris nisi ut aliquip ex ea'),
('Company H', 'Expenses', 2023, 3, 'Commodo consequat. Duis aute irure'),
('Company I', 'Financials', 2023, 2, 'Dolor in reprehenderit in voluptate'),
('Company J', 'Analysis', 2023, 2, 'Velit esse cillum dolore eu fugiat');
