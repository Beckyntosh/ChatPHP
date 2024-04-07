CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    company_type VARCHAR(50),
    year YEAR,
    quarter VARCHAR(50),
    report_content TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO financial_reports (report_title, company_type, year, quarter, report_content) VALUES 
('Q2 Earnings Report Tech Companies 2023', 'Tech', 2023, 'Q2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Financial Statement 2023', 'Finance', 2023, 'Q3', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Tech Industry Analysis 2022', 'Tech', 2022, 'Q4', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.'),
('Quarterly Reports 2022', 'Finance', 2022, 'Q1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Q4 Financial Overview', 'Tech', 2022, 'Q4', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Yearly Financial Report 2021', 'Finance', 2021, 'Q1', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.'),
('Quarterly Analysis 2021', 'Tech', 2021, 'Q2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Q1 Tech Company Results', 'Tech', 2021, 'Q1', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Economic Trends 2020', 'Finance', 2020, 'Q1', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.'),
('Tech Industry Forecast 2020', 'Tech', 2020, 'Q4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
