CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(50) NOT NULL,
    quarter VARCHAR(10) NOT NULL,
    year YEAR(4) NOT NULL,
    report TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO financial_reports (company_name, quarter, year, report) VALUES
('Company A', 'Q1', '2023', 'This is the financial report for Company A Q1 2023'),
('Company B', 'Q2', '2023', 'This is the financial report for Company B Q2 2023'),
('Company C', 'Q3', '2023', 'This is the financial report for Company C Q3 2023'),
('Company D', 'Q4', '2023', 'This is the financial report for Company D Q4 2023'),
('Company E', 'Q1', '2024', 'This is the financial report for Company E Q1 2024'),
('Company F', 'Q2', '2024', 'This is the financial report for Company F Q2 2024'),
('Company G', 'Q3', '2024', 'This is the financial report for Company G Q3 2024'),
('Company H', 'Q4', '2024', 'This is the financial report for Company H Q4 2024'),
('Company I', 'Q1', '2025', 'This is the financial report for Company I Q1 2025'),
('Company J', 'Q2', '2025', 'This is the financial report for Company J Q2 2025');