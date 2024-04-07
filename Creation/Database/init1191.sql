CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    year VARCHAR(4) NOT NULL,
    quarter VARCHAR(2) NOT NULL,
    company_sector VARCHAR(50),
    report TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO financial_reports (report_title, year, quarter, company_sector, report) VALUES 
('Q2 earnings reports for tech companies 2023', '2023', '2', 'Tech', 'Lorem ipsum 1'),
('Q3 financial updates for healthcare firms 2022', '2022', '3', 'Healthcare', 'Lorem ipsum 2'),
('Q1 financial analysis of retail sector 2021', '2021', '1', 'Retail', 'Lorem ipsum 3'),
('Q4 earnings forecast for energy companies 2024', '2024', '4', 'Energy', 'Lorem ipsum 4'),
('Q2 revenue trends in the automotive industry 2020', '2020', '2', 'Automotive', 'Lorem ipsum 5'),
('Q3 financial outcomes in the telecom sector 2019', '2019', '3', 'Telecom', 'Lorem ipsum 6'),
('Q1 profit margins of pharmaceutical companies 2018', '2018', '1', 'Pharmaceutical', 'Lorem ipsum 7'),
('Q4 market share analysis in the IT sector 2017', '2017', '4', 'IT', 'Lorem ipsum 8'),
('Q2 financial reports of consumer goods companies 2016', '2016', '2', 'Consumer Goods', 'Lorem ipsum 9'),
('Q3 revenue projections for banking institutions 2015', '2015', '3', 'Banking', 'Lorem ipsum 10');